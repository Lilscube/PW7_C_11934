@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0" style="color: #007bff;">
                <i class="fas fa-book"></i> Tambah Buku
            </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Books</a>
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
            <i class="fas fa-plus-circle"></i> Form Tambah Buku
        </div>
        <div class="card-body">
            <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="uploadGambar">Upload Gambar</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="title">Judul Buku</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" name="title" placeholder="Masukkan Judul Buku">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="author">Penulis</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" value="{{ old('author') }}" name="author" placeholder="Masukkan Nama Penulis">
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pages">Jumlah Halaman</label>
                        <input type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" value="{{ old('pages') }}" name="pages" placeholder="Masukkan Jumlah Halaman">
                        @error('pages')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
