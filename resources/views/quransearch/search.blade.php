@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Hasil Pencarian untuk: <span style="color: red">"{{ $query }}"</span></h2>

    @if(count($results) > 0)
        <div class="row">
            @foreach($results as $result)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm h-100 animate-card">
                        <div class="card-body">
                            <h5 class="card-title">Surah {{ $result['surah'] }}: Ayat {{ $result['ayah'] }}</h5>
                            <audio controls class="audio-player">
                                <source src="{{ $result['audio'] }}" type="audio/mpeg">
                                Browser Anda tidak mendukung audio.
                            </audio>
                            <p class="arabic-text">{{ $result['arab'] }}</p>
                            <p><strong>Latin:</strong> {{ $result['latin'] }}</p>
                            <p><strong>Terjemah:</strong> {{ $result['text'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada hasil ditemukan untuk kata kunci "{{ $query }}".</p>
    @endif
</div>
@endsection