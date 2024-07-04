<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index(){
    $autors = Autor::all();
    return view('autors/show',compact('autors'));
}
public function create(){
return view('autors/create');
}
public function store(Request $request){
    $request->validate([
        'name' =>'required',
    ]);
    Autor::create($request->all());
    return redirect()->route('autors.show')->with('succes','L\' a été ajouté avec succès') ;
}
public function show(){
    return view ('autors.show', compact('autors'));
}

public function edit($id)
{
    $autor = Autor::findOrFail($id);
    return view('autors.edit', compact('autor'));
}

public function update(Request $request, Autor $autor)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $autor->update($request->all());
    return redirect()->route('autors.show')->with('success', 'Auteur modifié avec succés.');
}

public function destroy(Autor $autor)
{
    $autor->delete();
    return redirect()->route('autors.show')->with('success', 'Auteur supprimé avec succés .');
}

}
