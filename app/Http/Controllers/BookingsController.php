<?php

namespace App\Http\Controllers;
use App\Models\Bookings;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{
       /** 
    * index 
    * 
    * @return void 
    */ 
    public function index() 
    { 
        $bookings = Bookings::latest()->paginate(5); 
    //render view with posts 
        return view('bookings.index', compact('bookings')); 
    } 

    // public function store(Request $request){
    //     $books = Book::all();
    //     return view('bookings.create', compact('books'));
    // }

    public function create(){
        $books = Book::all();
        return view('bookings.create', compact('books'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_book' => 'required|exists:books,id',
            'class' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Bookings::create($request->all());

        return redirect()->route('bookings.index')->with(['success' => 'Booking Berhasil Ditambahkan!']);
    }

    public function edit($id){
        $booking = Bookings::findOrFail($id);
        $books = Book::all();
        return view('bookings.edit', compact('booking', 'books'));
    }

    public function update(Request $request, $id){
        $booking = Bookings::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'id_book' => 'required|exists:books,id',
            'class' => 'required',
            'price' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with(['success' => 'Booking Berhasil Diubah!']);
    }
    

    public function destroy($id){
        $booking = Bookings::findOrFail($id); 
        $booking->delete();

        return redirect()->route('bookings.index')->with(['success' => 'Booking Berhasil Dihapus!']);
    }

}
