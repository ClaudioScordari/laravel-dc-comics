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
                    <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary w-100 mb-3">Vedi</a>
                    <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning w-100 mb-3">Modifica</a>
                    {{-- Piccolo form che cancella --}}
                    <form onsubmit="return confirm('Sicuro che vuoi eliminare?')" action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            Elimina
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection