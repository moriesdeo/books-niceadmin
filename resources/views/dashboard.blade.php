@php use App\Models\Book; @endphp
@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="card-title">Books Summary</h5>
            <p>Total Books: {{ Book::count() }}</p>
        </div>
    </div>
@endsection
