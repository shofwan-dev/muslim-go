@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Kitab: {{ $hadithBook['name'] }}</h1>
    <p class="text-center">Total Hadits: {{ $hadithBook['total'] }}</p>

    <div class="row">
        @foreach($hadiths as $hadith)
        <div class="col-12 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">Hadits {{ $hadith['number'] }}</h5>
                    <p class="arabic-text" style="font-family: 'Scheherazade', serif; font-size: 2rem;">{{ $hadith['arab'] }}</p>
                    <div class="translation-text">
                        @php
                            $paragraphs = explode('.', $hadith['id']); // Pisahkan berdasarkan titik
                        @endphp
                        @foreach(array_chunk($paragraphs, 2) as $chunk) <!-- Setiap 4 kalimat -->
                            <p style="text-align: justify;">
                                {{ implode('. ', $chunk) }}.
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-4 text-center">
        @for($i = 1; $i <= $hadithBook['pagination']['totalPages']; $i++)
            <a href="{{ route('hadits.show', $hadithBook['slug']) }}?page={{ $i }}" class="btn btn-sm btn-secondary {{ $i == $hadithBook['pagination']['currentPage'] ? 'active' : '' }}">
                {{ $i }}
            </a>
        @endfor
    </div>
</div>
@endsection