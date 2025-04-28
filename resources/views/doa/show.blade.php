@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">{{ $doa['judul'] }}</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Arab:</strong> {{ $doa['arab'] }}</p>
            <p><strong>Latin:</strong> {{ $doa['latin'] }}</p>
            <p><strong>Terjemah:</strong> {{ $doa['terjemah'] }}</p>
        </div>
    </div>
    <a href="{{ route('doa.index') }}" class="btn btn-secondary mt-4">← Kembali ke Daftar Doa</a>
</div>
@endsection