<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Comic;

class ComicController extends Controller
{   
    /* 
        ----------- READ ------------
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        // dd($comics);

        return view('comics.index', compact('comics'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }
    /* 
        ------------ ENDREAD ------------ 
    */

    /* 
        ------------ CREATE ------------ 
    */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputDatas = $request->all();
        // dd($inputDatas);

        // Creo un'altra istanza con i dati dell'input
        $comic = new Comic();   
        $comic->title = $inputDatas['title'];
        $comic->description = $inputDatas['description'];
        $comic->thumb = $inputDatas['src'];
        $comic->price = $inputDatas['price'];
        $comic->series = $inputDatas['series'];
        $comic->sale_date = $inputDatas['sale_date'];
        $comic->type = $inputDatas['type'];

        // Artisti
        $comic->artists = str_replace(',', ' | ', $inputDatas['artists']);

        // Writers
        $comic->writers = str_replace(',', ' | ', $inputDatas['writers']);

        $comic->save();
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }
    /* 
        ------------ ENDCREATE ------------ 
    */

    /* 
        ------------ UPDATE ------------ 
    */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);
        // dd($comic);
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comic = Comic::find($id); 
        $datasModified = $request->all();

        $comic->title = $datasModified['title'];
        $comic->description = $datasModified['description'];
        $comic->thumb = $datasModified['src'];
        $comic->price = $datasModified['price'];
        $comic->series = $datasModified['series'];
        $comic->sale_date = $datasModified['sale_date'];
        $comic->type = $datasModified['type'];
        $comic->artists = str_replace(',', ' | ', $datasModified['artists']);
        $comic->writers = str_replace(',', ' | ', $datasModified['writers']);
        $comic->save();
        return redirect()->route('comics.show', ['comic' => $comic->id]); 
    }
    /* 
        ------------ ENDUPDATE ------------ 
    */

    /* 
        ------------ DESTROY ------------ 
    */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
