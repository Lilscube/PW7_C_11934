@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6" style="color: #007bff;">
            <h1 class="m-0" style="color: #007bff;">
                <i class="fas fa-calendar-plus"></i> Tambah Booking
            </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ url('bookings') }}">Bookings</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-plus-circle"></i> Form Tambah Booking
        </div>
        <div class="card-body">
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="class">Kelas</label>
                        <input type="text" name="class" class="form-control @error('class') is-invalid @enderror" value="{{ old('class') }}" placeholder="Masukkan Nama Kelas">
                            @error('class')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Harga</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="Masukkan Harga">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="book">Pilih Buku</label>
                    <select class="form-control @error('id_book') is-invalid @enderror" id="id_book" name="id_book">
                        <option value="">Pilih Buku</option>
                        @foreach($books as $book)
                            <option value="{{ $book->id }}" {{ old('id_book') == $book->id ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_book')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
