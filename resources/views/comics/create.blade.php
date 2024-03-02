@extends('layouts.app')

@section('page-title', 'Form')

@section('main-content')
    <h1>
        Form di creazione
    </h1>

    <div class="container">
        <h2>Aggiungi un Comic</h2>

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title">Titolo: <span class="text-danger">*</span></label>
                <input id="title" name="title" type="text" placeholder="Scrivi il titolo" required>
            </div>

            <div class="mb-3">
                <label for="description">Descrizione:</label>
                <textarea name="description" id="description" placeholder="Scrivi una descrizione"></textarea>
            </div>

            <div class="mb-3">
                <label for="src">Src: <span class="text-danger">*</span></label>
                <input id="src" name="src" type="text" placeholder="Src" required>
            </div>
            
            <div class="mb-3">
                <label for="price">Prezzo: <span class="text-danger">*</span></label>
                <input id="price" name="price" type="number" placeholder="Prezzo" required>
            </div>

            <div class="mb-3">
                <label for="series">Serie: <span class="text-danger">*</span></label>
                <input id="series" name="series" type="text" placeholder="Serie" required>
            </div>

            <div class="mb-3">
                <label for="sale_date">Data di vendita:</label>
                <input id="sale_date" name="sale_date" type="date" placeholder="Data vendita">
            </div>

            <div class="mb-3">
                <label for="type">Tipo: <span class="text-danger">*</span></label>
                <input id="type" name="type" type="text" placeholder="Tipo" required>
            </div>

            <div class="mb-3">
                <label for="artists">Artisti:</label>
                <textarea name="artists" id="artists" placeholder="Inserisci gli artisti"></textarea>
            </div>

            <div class="mb-3">
                <label for="writers">Scrittori:</label>
                <textarea name="writers" id="writers" placeholder="Inserisci gli scrittori"></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </div>
        </form>
    </div>
@endsection