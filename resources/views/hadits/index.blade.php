@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Kitab Hadits</h1>

    <div class="row">
        @foreach($hadithBooks as $book)
            @if(isset($book['name']) && isset($book['total']))
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-size: 2rem">{{ $book['name'] }}</h5>
                        <p>Total Hadits: {{ $book['total'] }}</p>
                        <a href="{{ route('hadits.show', $book['slug']) }}" class="btn btn-primary">Lihat Hadits</a>
                    </div>
                </div>
            </div>
            @else
            <p class="text-danger">Data tidak valid.</p>
            @endif
        @endforeach
    </div>
</div>
<pre>{{ print_r($hadithBooks, true) }}</pre>
@endsection