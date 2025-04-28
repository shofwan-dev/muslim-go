@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Dzikir Harian</h1>

    <!-- Form Filter Dzikir -->
    <form method="GET" action="{{ route('dzikir.index') }}" id="filterForm" class="mb-4">
        <div class="row g-2">
            <div class="col-md-6 mx-auto">
                <select name="type" class="form-select" id="typeDropdown">
                    <option value="">Semua Dzikir</option>
                    <option value="pagi" {{ $type === 'pagi' ? 'selected' : '' }}>Dzikir Pagi</option>
                    <option value="sore" {{ $type === 'sore' ? 'selected' : '' }}>Dzikir Sore</option>
                    <option value="solat" {{ $type === 'solat' ? 'selected' : '' }}>Dzikir Setelah Solat</option>
                </select>
            </div>
        </div>
    </form>

    <!-- Daftar Dzikir -->
    <div class="accordion" id="accordionDzikir">
        @forelse($dzikirs as $index => $dzikir)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{ $index }}">
                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $index }}">
                    Dzikir {{ ucfirst($dzikir['type'] ?? 'Umum') }} - {{ $index + 1 }}
                </button>
            </h2>
            <div id="collapse-{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionDzikir">
                <div class="accordion-body">
                    <p><strong>Arab:</strong> <span style="font-family: 'Scheherazade', serif; font-size: 2rem;">{{ $dzikir['arab'] ?? 'Teks Arab tidak tersedia' }}</span></p>
                    <p><strong>Terjemahan:</strong> {{ $dzikir['indo'] ?? 'Terjemahan tidak tersedia' }}</p>
                    <p><strong>Diulang:</strong> {{ $dzikir['ulang'] ?? '1x' }}</p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-center mt-4">Tidak ada dzikir yang ditemukan.</p>
        @endforelse
    </div>
</div>

<script>
    // Kirim formulir secara otomatis saat dropdown berubah
    document.getElementById('typeDropdown').addEventListener('change', function () {
        document.getElementById('filterForm').submit();
    });
</script>
@endsection