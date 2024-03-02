@extends('layouts.app')

@section('page-title', '{{ $comic->title }}' . 'modifica')

@section('main-content')
    <h1>
        Form di aggiornamento
    </h1>

    <div class="container">
        <h2>Modifica il Comic</h2>

        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title">Titolo: <span class="text-danger">*</span></label>
                <input value="{{ $comic->title }}" id="title" name="title" type="text" placeholder="Scrivi il titolo" required>
            </div>

            <div class="mb-3">
                <label for="description">Descrizione:</label>
                <textarea name="description" id="description" placeholder="Scrivi una descrizione">{{ $comic->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="src">Src: <span class="text-danger">*</span></label>
                <input value="{{ $comic->thumb }}" id="src" name="src" type="text" placeholder="Src" required>
            </div>
            
            <div class="mb-3">
                <label for="price">Prezzo: <span class="text-danger">*</span></label>
                <input value="{{ $comic->price }}" id="price" name="price" type="number" placeholder="Prezzo" required>
            </div>

            <div class="mb-3">
                <label for="series">Serie: <span class="text-danger">*</span></label>
                <input value="{{ $comic->series }}" id="series" name="series" type="text" placeholder="Serie" required>
            </div>

            <div class="mb-3">
                <label for="sale_date">Data di vendita:</label>
                <input value="{{ $comic->sale_date }}" id="sale_date" name="sale_date" type="date" placeholder="Data vendita">
            </div>

            <div class="mb-3">
                <label for="type">Tipo: <span class="text-danger">*</span></label>
                <input value="{{ $comic->type }}" id="type" name="type" type="text" placeholder="Tipo" required>
            </div>

            <div class="mb-3">
                <label for="artists">Artisti:</label>
                <textarea name="artists" id="artists" placeholder="Inserisci gli artisti">{{ $comic->artists }}</textarea>
            </div>

            <div class="mb-3">
                <label for="writers">Scrittori:</label>
                <textarea name="writers" id="writers" placeholder="Inserisci gli scrittori">{{ $comic->writers }}</textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-warning">Aggiorna</button>
            </div>
        </form>
    </div>
@endsection