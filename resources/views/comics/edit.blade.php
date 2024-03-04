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
                <input class="@error('title') is-invalid @enderror" value="{{ old('title', $comic->title) }}" maxlength="64" id="title" name="title" type="text" placeholder="Scrivi il titolo" required>
                {{-- Barra errore --}}
                @error('title')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Descrizione:</label>
                <textarea class="@error('description') is-invalid @enderror" maxlength="4096" name="description" id="description" placeholder="Scrivi una descrizione">
                    {{ old('description', $comic->description) }}
                </textarea>
                {{-- Barra errore --}}
                @error('description')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="src">Src: <span class="text-danger">*</span></label>
                <input class="@error('src') is-invalid @enderror" value="{{ old('src', $comic->thumb) }}" maxlength="1024" id="src" name="src" type="text" placeholder="Src">
                {{-- Barra errore --}}
                @error('src')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label for="price">Prezzo: <span class="text-danger">*</span></label>
                <input class="@error('price') is-invalid @enderror" value="{{ old('price', $comic->price) }}" id="price" name="price" type="number" placeholder="Prezzo" required>
                {{-- Barra errore --}}
                @error('price')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="series">Serie: <span class="text-danger">*</span></label>
                <input class="@error('series') is-invalid @enderror" value="{{ old('series', $comic->series) }}" maxlength="64" id="series" name="series" type="text" placeholder="Serie" required>
                {{-- Barra errore --}}
                @error('series')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale_date">Data di vendita:</label>
                <input class="@error('sale_date') is-invalid @enderror" value="{{ old('sale_date', $comic->sale_date) }}" id="sale_date" name="sale_date" type="date" placeholder="Data vendita">
                {{-- Barra errore --}}
                @error('sale_date')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type">Tipo: <span class="text-danger">*</span></label>
                <input class="@error('type') is-invalid @enderror" value="{{ old('type', $comic->type) }}" maxlength="32" id="type" name="type" type="text" placeholder="Tipo" required>
                {{-- Barra errore --}}
                @error('type')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="artists">Artisti:</label>
                <textarea class="@error('artists') is-invalid @enderror" maxlength="1024" name="artists" id="artists" placeholder="Inserisci gli artisti">
                    {{ old('artists') }}
                </textarea>
                {{-- Barra errore --}}
                @error('artists')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="writers">Scrittori:</label>
                <textarea class="@error('writers') is-invalid @enderror" maxlength="1024" name="writers" id="writers" placeholder="Inserisci gli scrittori">
                    {{ old('writers') }}
                </textarea>
                {{-- Barra errore --}}
                @error('writers')
                    <div class="alert alert-danger">	
                        {{ $message }} 
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-warning">Aggiorna</button>
            </div>
        </form>
    </div>
@endsection