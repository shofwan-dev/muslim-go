@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Kumpulan Doa</h1>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('doa.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari doa..." value="{{ $search }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <!-- Accordion Doa -->
    <div class="accordion" id="accordionDoa">
        @foreach($doas as $index => $doa)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{ $index }}">
                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $index }}">
                    {{ $index + 1 }}. {{ $doa['judul'] }}
                </button>
            </h2>
            <div id="collapse-{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $index }}" data-bs-parent="#accordionDoa">
                <div class="accordion-body">
                    <p><strong>Arab:</strong> <span style="font-family: 'Scheherazade', serif; font-size: 1.5rem;">{{ $doa['arab'] }}</span></p>
                    <p><strong>Latin:</strong> {{ $doa['latin'] }}</p>
                    <p><strong>Terjemah:</strong> {{ $doa['terjemah'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection