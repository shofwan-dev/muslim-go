@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Form Pencarian -->
<form action="{{ route('quran.search') }}" method="GET" class="d-flex mb-4">
    <input type="text" name="query" class="form-control me-2" placeholder="Cari kata dalam quran..." required>
    <button type="submit" class="btn btn-primary">Cari</button>
</form>
    <h2 class="mb-4 text-center">{{ $surah['namaLatin'] }} (<span style="font-family: 'Scheherazade', serif; font-size: 4rem;">{{ $surah['nama'] }}</span>)</h2>
    <p class="text-center mb-5">{{ $surah['arti'] }} - {{ $surah['tempatTurun'] }} - {{ $surah['jumlahAyat'] }} Ayat</p>

    <!-- Deskripsi Surat -->
    <div class="mb-4">
        <h5>Deskripsi:</h5>
        <p>{!! $surah['deskripsi'] !!}</p>
    </div>

        <!-- Dropdown untuk memilih Qori -->
    <div class="mb-4">
        <label for="qoriSelect" class="form-label">Pilih Qori:</label>
        <select id="qoriSelect" class="form-select">
            <option value="01">Abdullah Al-Juhany</option>
            <option value="02">Abdul Muhsin Al-Qasim</option>
            <option value="03">Abdurrahman as-Sudais</option>
            <option value="04">Ibrahim Al-Dossari</option>
            <option value="05" selected>Misyari Rasyid Al-Afasi</option>
        </select>
    </div>

    <!-- Daftar Ayat -->
    @foreach($surah['ayat'] as $index => $ayat)
        @if($index === 0 && $surah['namaLatin'] !== 'Al-Fatihah')
        <div class="card mb-3 shadow-sm" id="ayat-bismillah">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="badge bg-primary">Basmallah</span>
                    <!-- Audio Player -->
                    <audio controls class="audio-player" data-index="bismillah" data-audio='@json($bismillahAyat['audio'])'>
                        <source src="{{ $bismillahAyat['audio']['05'] }}" type="audio/mpeg" class="audio-source">
                        Browser anda tidak mendukung audio.
                    </audio>
                </div>
                
                <!-- Teks Arab -->
                <h4 class="text-end" style="font-family: 'Scheherazade', serif; font-size: 2rem;">
                    {{ $bismillahAyat['teksArab'] }}
                </h4>
                
                <!-- Terjemahan -->
                <p class="mt-2">{{ $bismillahAyat['teksIndonesia'] }}</p>
            </div>
        </div>
        @endif
        <div class="card mb-3 shadow-sm" id="ayat-{{ $index }}">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="badge bg-primary">Ayat {{ $ayat['nomorAyat'] }}</span>
                    <audio controls class="audio-player" data-index="{{ $index }}" data-audio='@json($ayat['audio'])'>
                        <source src="{{ $ayat['audio']['05'] }}" type="audio/mpeg" class="audio-source">
                        Browser anda tidak mendukung audio.
                    </audio>
                </div>
                <h4 class="text-end" style="font-family: 'Scheherazade', serif; font-size: 2rem;">{{ $ayat['teksArab'] }}</h4>
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

    <div class="d-flex justify-content-between mt-5">
        {{-- Tombol Surat Sebelumnya --}}
        @if(!empty($surah['suratSebelumnya']))
        <a href="{{ url('/quran/' . $surah['suratSebelumnya']['nomor']) }}" class="btn btn-primary">
            ← {{ $surah['suratSebelumnya']['namaLatin'] }}
        </a>
        @else
        <span></span>
        @endif

        {{-- Tombol Kembali ke Daftar Surah --}}
        <a href="{{ url('/quran') }}" class="btn btn-secondary">Kembali ke Daftar Surah</a>

        {{-- Tombol Surat Selanjutnya --}}
        @if(!empty($surah['suratSelanjutnya']))
        <a href="{{ url('/quran/' . $surah['suratSelanjutnya']['nomor']) }}" class="btn btn-primary">
            {{ $surah['suratSelanjutnya']['namaLatin'] }} →
        </a>
        @else
        <span></span>
        @endif
    </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qoriSelect = document.getElementById('qoriSelect');
        const audioPlayers = document.querySelectorAll('.audio-player');

        // Update audio source when qori is changed
        qoriSelect.addEventListener('change', function () {
            const selectedQori = qoriSelect.value;

            audioPlayers.forEach((audio) => {
                const source = audio.querySelector('.audio-source');
                const audioData = JSON.parse(audio.getAttribute('data-audio')); // Ambil data audio dari atribut

                // Update the source URL dynamically
                const newUrl = audioData[selectedQori];
                console.log(`Updating audio source: ${newUrl}`); // Log URL
                source.src = newUrl;
                audio.load(); // Reload the audio player
            });
        });

        // Auto-play next audio when current audio ends
        audioPlayers.forEach((audio, index) => {
            audio.addEventListener('ended', function () {
                let nextIndex;

                // Handle "bismillah" index
                if (audio.getAttribute('data-index') === 'bismillah') {
                    nextIndex = 0; // Play the first ayat after Bismillah
                } else {
                    nextIndex = parseInt(audio.getAttribute('data-index')) + 1;
                }

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