<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Comic;

class ComicController extends Controller
{   
    // Validazine Backend
    private static $validRules = [
        'title'         => 'required|unique:comics|max:64', 
        'description'   => 'nullable|max:4096', 
        'src'           => 'nullable|max:1024|url', 
        'price'         => 'required|numeric', 
        'series'        => 'required|max:64', 
        'sale_date'     => 'nullable|date', 
        'type'          => 'required|max:32', 
        'artists'       => 'nullable|max:1024', 
        'writers'       => 'nullable|max:1024', 
    ];

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
        $validDatas = $request->validate(self::$validRules);

        // dd($validDatas);

        // Creo un'altra istanza con i dati dell'input
        $comic = new Comic();   
        $comic->title = $validDatas['title'];
        $comic->description = $validDatas['description'];
        $comic->thumb = $validDatas['src'];
        $comic->price = $validDatas['price'];
        $comic->series = $validDatas['series'];
        $comic->sale_date = $validDatas['sale_date'];
        $comic->type = $validDatas['type'];

        // Artisti
        $comic->artists = str_replace(',', ' | ', $validDatas['artists']);

        // Writers
        $comic->writers = str_replace(',', ' | ', $validDatas['writers']);

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

        $validDatas = $request->validate(self::$validRules);

        $comic->title = $validDatas['title'];
        $comic->description = $validDatas['description'];
        $comic->thumb = $validDatas['src'];
        $comic->price = $validDatas['price'];
        $comic->series = $validDatas['series'];
        $comic->sale_date = $validDatas['sale_date'];
        $comic->type = $validDatas['type'];
        $comic->artists = str_replace(',', ' | ', $validDatas['artists']);
        $comic->writers = str_replace(',', ' | ', $validDatas['writers']);
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
