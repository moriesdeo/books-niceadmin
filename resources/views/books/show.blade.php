@extends('layouts.main')

@section('title', 'Detail Buku')

@section('content')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title">Detail Informasi Buku</h5>
                    <div>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Informasi Buku</h5>
                                <div class="row mb-3">
                                    <div class="col-lg-4 col-md-4 label">Judul</div>
                                    <div class="col-lg-8 col-md-8">{{ $book->title }}</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-4 col-md-4 label">Penulis</div>
                                    <div class="col-lg-8 col-md-8">{{ $book->author }}</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-4 col-md-4 label">Tahun Terbit</div>
                                    <div class="col-lg-8 col-md-8">{{ $book->published_year ?: 'Tidak tersedia' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <div class="card-text">
                                    {!! nl2br(e($book->description)) ?: '<p class="text-muted fst-italic">Tidak ada deskripsi</p>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Informasi Tambahan</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="row mb-3">
                                            <div class="col-lg-4 col-md-4 label">Ditambahkan pada</div>
                                            <div
                                                class="col-lg-8 col-md-8">{{ $book->created_at->format('d M Y H:i') }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row mb-3">
                                            <div class="col-lg-4 col-md-4 label">Terakhir diperbarui</div>
                                            <div
                                                class="col-lg-8 col-md-8">{{ $book->updated_at->format('d M Y H:i') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12 d-flex justify-content-end">
                        <form action="{{ route('books.destroy', $book) }}" method="POST"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Hapus Buku
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
