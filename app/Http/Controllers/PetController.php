<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Retorna a Lista de Pets cadastrados
     *
     * @return Collection
     */
    public function index()
    {
        return Pet::get();
    }

    /**
     * Armazena um novo pet no banco de dados
     * 
     * @param PetRequest $request
     * @return Pet
     */

    public function store(PetRequest $request) 
    {
        $PetData = $request->all();

        return Pet::create($PetData);
    }
}
