@php
use App\Constants\ViewName;
use App\Constants\RouteName;
@endphp
<!-- Sidebar untuk NiceAdmin -->
<aside id="sidebar" class="sidebar">

    <div class="sidebar-brand d-flex align-items-center justify-content-center mb-4">
        <span class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</span>
    </div>

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route(RouteName::HOME) }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('books.index') }}">
                <i class="bi bi-book"></i>
                <span>Buku</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route(RouteName::LOGOUT) }}"
               onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin logout?')) { document.getElementById('logout-form').submit(); }">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route(RouteName::LOGOUT) }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

</aside>
