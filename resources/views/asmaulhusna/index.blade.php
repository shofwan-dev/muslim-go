{{-- filepath: c:\xampp\htdocs\muslim-go\muslim-go\resources\views\asmaulhusna\index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Asmaul Husna</h1>
    <p class="text-center mb-5">99 Nama Allah yang Indah dan Mulia</p>

    <div class="row g-4" style="direction: rtl;">
        @foreach($asmaulHusna as $asma)
        <div class="col-md-4 col-lg-3">
            <div class="card asmaul-husna-card text-center shadow-sm">
                <div class="card-body">
                    <h2 class="arabic-text" style="font-family: 'Scheherazade', serif; font-size: 2rem;">{{ $asma['arab'] }}</h2>
                    <h5 class="latin-text mt-3">{{ $asma['latin'] }}</h5>
                    <p class="indo-text">{{ $asma['indo'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection