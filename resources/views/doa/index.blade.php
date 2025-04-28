{{-- filepath: c:\xampp\htdocs\muslim-go\muslim-go\resources\views\doa\index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Kumpulan Doa</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('doa.index') }}" class="mb-4">
        <div class="row g-2">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Cari doa..." value="{{ $search }}">
            </div>
            <div class="col-md-4">
                <select name="source" class="form-select">
                    <option value="">Semua Sumber</option>
                    <option value="quran" {{ $source === 'quran' ? 'selected' : '' }}>Quran</option>
                    <option value="hadits" {{ $source === 'hadits' ? 'selected' : '' }}>Hadits</option>
                    <option value="pilihan" {{ $source === 'pilihan' ? 'selected' : '' }}>Pilihan</option>
                    <option value="harian" {{ $source === 'harian' ? 'selected' : '' }}>Harian</option>
                    <option value="ibadah" {{ $source === 'ibadah' ? 'selected' : '' }}>Ibadah</option>
                    <option value="haji" {{ $source === 'haji' ? 'selected' : '' }}>Haji</option>
                    <option value="lainnya" {{ $source === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </div>
    </form>

    <!-- Accordion Doa -->
    <div class="accordion" id="accordionDoa">
        @forelse($doas as $index => $doa)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{ $index }}">
                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $index }}">
                    {{ $index + 1 }}. {{ $doa['judul'] ?? 'Judul tidak tersedia' }}
                </button>
            </h2>
            <div id="collapse-{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionDoa">
                <div class="accordion-body">
                    <p><strong>Arab:</strong> <span style="font-family: 'Scheherazade', serif; font-size: 2rem;">{{ $doa['arab'] ?? 'Teks Arab tidak tersedia' }}</span></p>
                    <p><strong>Terjemahan:</strong> {{ $doa['indo'] ?? 'Terjemahan tidak tersedia' }}</p>
                    <p><strong>Sumber:</strong> {{ ucfirst($doa['source'] ?? 'Tidak diketahui') }}</p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center mt-4">Tidak ada doa yang ditemukan.</p>
        @endforelse
    </div>
</div>
@endsection