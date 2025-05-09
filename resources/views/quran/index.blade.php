@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('quran.search') }}" method="GET" class="d-flex mb-4">
        <input type="text" name="query" class="form-control me-2" placeholder="Cari kata dalam quran..." required>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>
    <h1 class="mb-4 text-center">Daftar Surah Al-Qur'an</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($surahs as $surah)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <span class="badge bg-primary rounded-circle me-3 p-2">{{ $surah['nomor'] }}</span>
                    <h5 class="card-title"><span style="font-family: 'Scheherazade', serif; font-size: 2rem;">{{ $surah['nama'] }}</span></h5>
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
