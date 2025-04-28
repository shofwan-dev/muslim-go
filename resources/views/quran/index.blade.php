@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Surah Al-Qur'an</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($surahs as $surah)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <span class="badge bg-primary rounded-circle me-3 p-2">{{ $surah['nomor'] }}</span>
                    <h5 class="card-title">{{ $surah['nama'] }}</h5>
                    <h3 class="card-title">< {{ $surah['namaLatin'] }} ></h3>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-book-open text-primary"></i> {{ $surah['arti'] }}</li>
                        <li><i class="fas fa-list-ol text-success"></i> {{ $surah['jumlahAyat'] }} Ayat</li>
                        <li><i class="fas fa-map-marker-alt text-danger"></i> {{ $surah['tempatTurun'] }}</li>
                    </ul>
                    <a href="{{ url('/quran/' . $surah['nomor']) }}" class="btn btn-success">Baca Surah</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
