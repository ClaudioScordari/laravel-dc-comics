@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')
    <h1>
        Comics
    </h1>

    <div class="container mb-3">
        <div>
            <a href="{{ route('comics.create') }}" class="btn btn-primary w-100">Aggiungi comic</a>
        </div>
    </div>

    <div class="container d-flex justify-content-between flex-wrap">
        @foreach ($comics as $comic)
            <div class="card mb-4" style="width: 18rem;">
                <img class="card-img-top" src="{{ $comic->thumb }}" alt="{{ $comic->title }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <p class="card-text">{{ $comic->description }}</p>
                    <h6 class="my-3">${{ $comic->price }}</h6>
                    <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary w-100">Vedi</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection