@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Kitab: {{ $hadithBook['name'] }}</h1>
    <p>Total Hadits: {{ $hadithBook['total'] }}</p>

    <div class="list-group">
        @foreach($hadiths as $hadith)
        <div class="list-group-item">
            <h5>Hadits {{ $hadith['number'] }}</h5>
            <p style="font-family: 'Scheherazade', serif; font-size: 2rem;">{{ $hadith['arab'] }}</p>
            <p><strong>Terjemahan:</strong> {{ $hadith['id'] }}</p>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        @for($i = 1; $i <= $hadithBook['pagination']['totalPages']; $i++)
            <a href="{{ route('hadits.show', $hadithBook['slug']) }}?page={{ $i }}" class="btn btn-sm btn-secondary {{ $i == $hadithBook['pagination']['currentPage'] ? 'active' : '' }}">
                {{ $i }}
            </a>
        @endfor
    </div>
</div>
@endsection