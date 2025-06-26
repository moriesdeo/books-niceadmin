@extends('layouts.main')

@section('title', 'Edit Buku')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <h5 class="card-title">Form Edit Buku</h5>

                <form action="{{ route('books.update', $book) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <label for="title" class="form-label">Judul Buku</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}" required
                               class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="author" class="form-label">Penulis</label>
                        <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}" required
                               class="form-control @error('author') is-invalid @enderror">
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="published_year" class="form-label">Tahun Terbit</label>
                        <input type="number" name="published_year" id="published_year"
                               value="{{ old('published_year', $book->published_year) }}"
                               class="form-control @error('published_year') is-invalid @enderror">
                        @error('published_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" rows="4"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Perbarui
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
