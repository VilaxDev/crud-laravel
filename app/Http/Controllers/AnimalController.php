<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::paginate(10);
        return view('welcome', compact('animals'));
    }


    public function store(Request $request)
    {
        $animal = new Animal();
        $animal->nombre = $request->nombre;
        $animal->especie = $request->especie;
        $animal->raza = $request->raza;
        $animal->color = $request->color;
        $animal->edad = $request->edad;
        $animal->save();
        return redirect()->route('welcome');
    }


    public function update(Request $request, $id)
    {
        $animal = Animal::find($id);
        $animal->nombre = $request->nombre;
        $animal->especie = $request->especie;
        $animal->raza = $request->raza;
        $animal->color = $request->color;
        $animal->edad = $request->edad;
        $animal->save();
        return redirect()->route('welcome');
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
        $animal->delete();
        return redirect()->route('welcome');
    }
}
