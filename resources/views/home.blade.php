@extends('layouts.app')

@section('content')
<div class="container text-center">
    <img src="{{ asset('images/musllim_go.png') }}" alt="Ornament" width="100" class="mb-4">
    <h1 class="mb-4" style="font-family: 'Scheherazade', serif;">Selamat Datang di Muslim-Go</h1>
    <p class="mb-5">Platform Islami untuk kebutuhan harianmu.</p>

    <div class="row g-4">
        @php
            $menus = [
                ['name' => 'Quran', 'icon' => 'fas fa-book-quran', 'link' => '/muslim-go/muslim-go/public/quran'],
                ['name' => 'Doa', 'icon' => 'fas fa-hands-praying', 'link' => '/muslim-go/muslim-go/public/doa/'],
                ['name' => 'Al-Matsurat', 'icon' => 'fas fa-feather', 'link' => '/almatsurat'],
                ['name' => 'Asmaul Husna', 'icon' => 'fas fa-star-and-crescent', 'link' => '/asmaulhusna'],
                ['name' => 'Hadits', 'icon' => 'fas fa-scroll', 'link' => '/hadits'],
                ['name' => 'Arah Qiblat', 'icon' => 'fas fa-compass', 'link' => '/qibla'],
                ['name' => 'Blog Islami', 'icon' => 'fas fa-pen-nib', 'link' => '/blog'],
            ];
        @endphp

        @foreach($menus as $menu)
        <div class="col-6 col-md-4">
            <div class="card menu-card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <i class="{{ $menu['icon'] }} fa-3x mb-3 text-primary animated-icon"></i>
                    <h5 class="card-title">{{ $menu['name'] }}</h5>
                    <a href="{{ $menu['link'] }}" class="btn btn-primary mt-3">Buka</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
