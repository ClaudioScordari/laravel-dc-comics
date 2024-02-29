<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            Sto riempiendo i dati della tabella con gli stessi dati
            dell'array associativo preso con config
        */

        // Mi prendo tutti i comics
        $comics = config('comics');

        // Popolo le istanze con l'array di prima
        foreach($comics as $oneComic){
            $comic = new Comic();   
            $comic->title = $oneComic['title'];
            $comic->description = $oneComic['description'];
            $comic->thumb = $oneComic['thumb'];

            // Mi rompo la stringa del prezzo prendendo solo il numero
            $priceData = str_replace('$', '', $oneComic['price']); 

            // Nella proprietà metto il valore numerico di quel pezzetto
            $comic->price = floatval($priceData);

            $comic->series = $oneComic['series'];
            $comic->sale_date = $oneComic['sale_date'];
            $comic->type = $oneComic['type'];

            // Serializzo l'array degli artisti
            $artistsString = implode(', ', $oneComic['artists']);

            // Dentro la proprietà artists c'è una stringa, no un array
            $comic->artists = $artistsString;

            // Stessa cosa ho fatto per i writers
            $writersString = implode(', ', $oneComic['writers']);
            $comic->writers = $writersString;
            $comic->save();
        }
    }
}
