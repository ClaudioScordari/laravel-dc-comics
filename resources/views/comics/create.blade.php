@extends('layouts.app')

@section('page-title', 'Form')

@section('main-content')
<h1>
    Form di creazione
</h1>

<div class="container">
    <form action="{{ route('comics.store') }}" method="POST">
        Qui c'è un form
    </form>
@endsection