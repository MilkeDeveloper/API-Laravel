<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdocaoCollection;
use App\Models\Adocao;
use App\Rules\AdoptionUnicPet;
use Illuminate\Http\Request;

class AdocaoController extends Controller
{
    public function index()
    {
        $adoptions = Adocao::with('pet')->get();

        return new AdocaoCollection($adoptions);
    }


   /**
    * Cria um novo registro de adoção
    */
    public function store(Request $request)
    {
        $request->validate([
            "email" => ['required', 'email', new AdoptionUnicPet($request->input('pet_id', 0))],
            "valor" =>['required', 'numeric', 'between:10, 100'],
            "pet_id" => ['required', 'int', 'exists:pets,id']
        ]);

        $AdocaoData = $request->all();

        return Adocao::create($AdocaoData);

    }
}
