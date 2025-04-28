@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">{{ $surah['namaLatin'] }} ({{ $surah['nama'] }})</h2>
    <p class="text-center mb-5">{{ $surah['arti'] }} - {{ $surah['tempatTurun'] }} - {{ $surah['jumlahAyat'] }} Ayat</p>

    <!-- Deskripsi Surat -->
    <div class="mb-4">
        <h5>Deskripsi:</h5>
        <p>{!! $surah['deskripsi'] !!}</p>
    </div>

    <!-- Daftar Ayat -->
    @foreach($surah['ayat'] as $index => $ayat)
    <div class="card mb-3 shadow-sm" id="ayat-{{ $index }}">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-primary">Ayat {{ $ayat['nomorAyat'] }}</span>
                <audio controls class="audio-player" data-index="{{ $index }}">
                    <source src="{{ $ayat['audio']['01'] }}" type="audio/mpeg">
                    Browser anda tidak mendukung audio.
                </audio>
            </div>
            <h4 class="text-end" style="font-family: 'Scheherazade', serif;">{{ $ayat['teksArab'] }}</h4>
            <p class="mt-2">{{ $ayat['teksIndonesia'] }}</p>

            <!-- Accordion for Tafsir -->
            <div class="accordion" id="accordionTafsir-{{ $index }}">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{ $index }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="false" aria-controls="collapse-{{ $index }}">
                            Tafsir Ayat {{ $ayat['nomorAyat'] }}
                        </button>
                    </h2>
                    <div id="collapse-{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionTafsir-{{ $index }}">
                        <div class="accordion-body">
                            {{ $tafsir[$index]['teks'] ?? 'Tafsir tidak tersedia.' }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Accordion -->
        </div>
    </div>
    @endforeach

    <a href="{{ url('/quran') }}" class="btn btn-secondary mt-4">← Kembali ke Daftar Surah</a>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const audioPlayers = document.querySelectorAll('.audio-player');

        audioPlayers.forEach((audio, index) => {
            audio.addEventListener('ended', function () {
                const nextIndex = index + 1;
                const nextAudio = document.querySelector(`.audio-player[data-index="${nextIndex}"]`);
                const nextCard = document.getElementById(`ayat-${nextIndex}`);

                if (nextAudio) {
                    // Scroll to the next card
                    nextCard.scrollIntoView({ behavior: 'smooth', block: 'center' });

                    // Play the next audio
                    setTimeout(() => nextAudio.play(), 300); // Add slight delay for smooth transition
                }
            });
        });
    });
</script>
@endsection