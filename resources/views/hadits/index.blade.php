@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Kitab Hadits</h1>

    @php
        $hadithBooks = $hadithBooks ?? [];
    @endphp

    @if(is_array($hadithBooks) && count($hadithBooks) > 0)
        <div class="row">
            @foreach($hadithBooks as $book)
                @if(isset($book['name'], $book['total'], $book['slug']))
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 1.5rem; font-weight: bold;">{{ $book['name'] }}</h5>
                            <p>Total Hadits: {{ $book['total'] }}</p>
                            <a href="{{ route('hadits.show', $book['slug']) }}" class="btn btn-primary">Lihat Hadits</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-12">
                    <p class="text-danger text-center">Data kitab hadits tidak valid.</p>
                </div>
                @endif
            @endforeach
        </div>
    @else
        <p class="text-center text-muted">Tidak ada data kitab hadits yang tersedia.</p>
    @endif
</div>
@endsection