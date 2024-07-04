<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index(){
        $publishers = Publisher::all();
        return view('publishers/show',compact('publishers'));
    }
    public function create(){
    return view('publishers/create');
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'adress' =>'required',
        ]);
        Publisher::create($request->all());
        return redirect()->route('publishers.show')->with('succes','L\' a été ajouté avec succès') ;
    }
    public function show(){
        return view ('publishers.show', compact('publishers'));
    }
    
    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('publishers.edit', compact('publisher'));
    }
    
    public function update(Request $request, Publisher $publisher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'adress' =>'required',
        ]);
    
        $publisher->update($request->all());
        return redirect()->route('publishers.show')->with('success', 'Auteur modifié avec succés.');
    }
    
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return redirect()->route('publishers.show')->with('success', 'Auteur supprimé avec succés .');
    }
    
    }
    