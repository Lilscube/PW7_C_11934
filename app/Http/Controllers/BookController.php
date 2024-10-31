<?php


namespace App\Http\Controllers;
use Exception;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BookController extends Controller
{
    
    /** 
    * index 
    * 
    * @return void 
    */ 

    use ValidatesRequests;

    public function index(){
        //get book 
        $book = Book::latest()->paginate(5); 
        //render view with posts 
        return view('book.index', compact('book')); 
    }

     /** 
     * create 
     * 
     * @return void 
     */ 
    public function create() 
    { 
        return view('book.create'); 
    } 
    /** 
     * store 
     * 
     * @param Request $request 
     * @return void 
     */ 
    public function store(Request $request) 
    { 
        //Validasi Formulir 
        $this->validate($request, [ 
            'title' => 'required', 
            'author' => 'required', 
            'pages' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]); 

        $imagePath = $request->file('image')->store('images', 'public');
        //Fungsi Simpan Data ke dalam Database 
        Book::create([ 
            'image' => $imagePath,
            'title' => $request->title, 
            'author' => $request->author, 
            'pages' => $request->pages 
        ]); 
        try { 
            return redirect()->route('book.index')->with(['success' => 'Data Berhasil Ditambahkan!']); 
        } catch (Exception $e) { 
            return redirect()->route('book.index')->with(['error' => 'Data Gagal Ditambahkan!']); 
        }
    } 
    /** 
     * edit 
     * 
     * @param int $id 
     * @return void 
     */ 
    public function edit($id) { 
        $book = Book::find($id); 
        return view('book.edit', compact('book')); 
    }
    
    public function update(Request $request, $id) { 
        $book = Book::find($id); 
        //validate form 
        $this->validate($request, [ 
            'title' => 'required', 
            'author' => 'required', 
            'pages' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]); 

        $imagePath = $request->file('image')->store('images', 'public');

        $book->update([ 
            'image' => $imagePath,
            'title' => $request->title, 
            'author' => $request->author, 
            'pages' => $request->pages 
        ]); 
        return redirect()->route('book.index')->with(['success' => 'Data 
        Berhasil Diubah!']); 
    } 
    /** 
     * destroy 
     * 
     * @param int $id 
     * @return void 
     */ 
    public function destroy($id) 
    { 
        $book = Book::find($id); 
        $book->delete(); 
        return redirect()->route('book.index')->with(['success' => 'Data 
        Berhasil Dihapus!']); 
    } 
}
