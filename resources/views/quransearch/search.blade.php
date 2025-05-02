@extends('layouts.app')

@section('content')
<div class="container">
    @php
        // Fungsi untuk menghitung jumlah kemunculan kata pencarian
        $countOccurrences = function($results, $query) {
            $total = 0;
            foreach ($results as $result) {
                $total += substr_count(strtolower($result['arab']), strtolower($query));
                $total += substr_count(strtolower($result['latin']), strtolower($query));
                $total += substr_count(strtolower($result['text']), strtolower($query));
            }
            return $total;
        };

        $totalOccurrences = $countOccurrences($results, $query);
    @endphp

    <h2 class="mb-4">
        Hasil Pencarian untuk: <span style="color: red">"{{ $query }}"</span>
    </h2>
    <p class="mb-4">
        Total kemunculan kata <strong>"{{ $query }}"</strong>: <span style="color: blue;">{{ $totalOccurrences }}</span>
    </p>

    @if(count($results) > 0)
        <div class="row">
            @foreach($results as $result)
                @php
                    $highlight = function($text, $query) {
                        return preg_replace("/($query)/i", '<span style="color: red; font-weight: bold;">$1</span>', $text);
                    };
                @endphp
                <div class="col-12 mb-4">
                    <div class="card shadow-sm h-100 animate-card">
                        <div class="card-body">
                            <h5 class="card-title">Surah {{ $result['surah'] }}: Ayat {{ $result['ayah'] }}</h5>
                            <audio controls class="audio-player">
                                <source src="{{ $result['audio'] }}" type="audio/mpeg">
                                Browser Anda tidak mendukung audio.
                            </audio>
                            <p class="arabic-text">{!! $highlight($result['arab'], $query) !!}</p>
                            <p><strong>Latin:</strong> {!! $highlight($result['latin'], $query) !!}</p>
                            <p><strong>Terjemah:</strong> {!! $highlight($result['text'], $query) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada hasil ditemukan untuk kata kunci "<span style="color: red">{{ $query }}</span>".</p>
    @endif
</div>
@endsection