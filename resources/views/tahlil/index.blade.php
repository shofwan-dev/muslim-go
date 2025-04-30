<!-- filepath: c:\xampp\htdocs\muslim-go\muslim-go\resources\views\tahlil\index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Tahlil</h2>

    @if(count($tahlil) > 0)
        <div class="row">
            @foreach($tahlil as $item)
                <div class="col-12 mb-4">
                    <div class="card shadow-sm h-100 animate-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-primary">{{ $item['no'] }}</span>
                                <h4>{{ $item['judul'] }}</h5>
                            </div>
                            <p class="arabic-text">{{ $item['arab'] }}</p>
                            <p><strong>Terjemah:</strong> {{ $item['id'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Tidak ada data tahlil yang tersedia.</p>
    @endif
</div>
@endsection