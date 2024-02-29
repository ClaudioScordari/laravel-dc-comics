@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')
<h1>
    Comics
</h1>

<div class="container d-flex justify-content-between flex-wrap">
    @foreach ($comics as $comic)
        <div class="card mb-4" style="width: 18rem;">
            <img class="card-img-top" src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}">

            <div class="card-body">
                <h5 class="card-title">{{ $comic['title'] }}</h5>
                <p class="card-text">{{ $comic['description'] }}</p>
                {{-- <a href="{{ route('comics.show', ['id' => $comic['id']]) }}" class="btn btn-primary">Vedi</a> --}}
            </div>
        </div>
    @endforeach
</div>
@endsection