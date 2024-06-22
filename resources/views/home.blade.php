@extends('layouts.app')

@section('content')
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
        <div class="col">
            <div class="card shadow">
                <img src="{{ asset('img/sepatu1.jpg') }}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <img src="{{ asset('img/sepatu2.jpg') }}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col">
            <div class="card shadow">
                <img src="{{ asset('img/sepatu3.jpg') }}" class="card-img-top" alt="...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-center mt-1">
            <h2>Flash Sale</h2>
        </div>
    </div>
    
    @endsection
