<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function pokedexApiPhp()
    {
        /* Utilizzo Api esterna mediante link */

        /* $endpoint = 'https://raw.githubusercontent.com/Biuni/PokemonGO-Pokedex/master/pokedex.json';
        $pokedex = Http::get($endpoint)->json();

        $title = 'Pokedex';

        dd($pokedex['pokemon']);

        return view('pokedex.pokemon', ['pokedex' => $pokedex['pokemon'], 'title' => $title]);
        return $pokedex['pokemon'];  */

        /* Utilizzo json interno al sito */
        $jsonPath = public_path('json/pokedex.json');

        try {
            $jsonData = file_get_contents($jsonPath);
            $data = json_decode($jsonData, true);

            if (isset($data['pokemon']) && is_array($data['pokemon'])) {
                $pokedex = $data['pokemon'];
                return view('pokedex.pokemon', compact('pokedex'));
                /* return $pokedex; */
            } else {
                return response()->json(['error' => 'Formato JSON non valido: la chiave "pokemon" non è presente o non è un array'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Errore nel caricamento dei dati JSON: ' . $e->getMessage()], 500);
        }

    }

    public function pokedexApiJs()
    {
//far vedere solo la vista
    }
}
