@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Kisah Nabi</h2>

    @if(count($kisahNabi) > 0)
        <div class="row">
            @foreach($kisahNabi as $nabi)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm h-100 animate-card">
                        <div class="row g-0">
                            <!-- Gambar Nabi -->
                            <div class="col-md-4">
                                <img src="{{ $nabi['image_url'] }}" class="img-fluid rounded-start" alt="Gambar {{ $nabi['name'] }}">
                            </div>
                            <!-- Konten Kisah Nabi -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $nabi['name'] }}</h5>
                                    <p><strong>Tahun Kelahiran:</strong> {{ $nabi['thn_kelahiran'] }}</p>
                                    <p><strong>Usia:</strong> {{ $nabi['usia'] }} tahun</p>
                                    <p><strong>Tempat:</strong> {{ $nabi['tmp'] }}</p>
                                    <p class="description-text" style="text-align: justify">{{ Str::limit($nabi['description'], 300, '...') }}</p>
                                    <a href="#" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#modal{{ $loop->index }}">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{ $loop->index }}" tabindex="-1" aria-labelledby="modalLabel{{ $loop->index }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $loop->index }}">{{ $nabi['name'] }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ $nabi['image_url'] }}" class="img-fluid rounded mb-3" alt="Gambar {{ $nabi['name'] }}">
                                <p><strong>Tahun Kelahiran:</strong> {{ $nabi['thn_kelahiran'] }}</p>
                                <p><strong>Usia:</strong> {{ $nabi['usia'] }} tahun</p>
                                <p><strong>Tempat:</strong> {{ $nabi['tmp'] }}</p>
                                <!-- Format teks deskripsi -->
                                @php
                                    $paragraphs = explode('.', $nabi['description']); // Pisahkan berdasarkan titik
                                @endphp
                                @foreach(array_chunk($paragraphs, 4) as $chunk) <!-- Setiap 4 kalimat -->
                                    <p style="text-align: justify;">
                                        {{ implode('. ', $chunk) }}.
                                    </p>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Tidak ada data kisah nabi yang tersedia.</p>
    @endif
</div>
@endsection