<?php

namespace App\Http\Controllers;

use App\Models\Shelve;
use Illuminate\Http\Request;

class ShelveController extends Controller
{ 
        public function index(){
            $shelves = Shelve::all();
            return view('shelves/show',compact('shelves'));
        }
    public function create(){
        return view('shelves/create');
    }
        public function store(Request $request){
            $request->validate([
                'title' =>'required',
                'description' =>'required',
            ]);
            Shelve::create($request->all());
            return redirect()->route('shelves.show')->with('succes','Le rayon a été ajouté avec succès') ;
        }
        public function show(){
            return view ('shelves.show', compact('shelves'));
        }
        
        public function edit($id)
        {
            $shelve = Shelve::findOrFail($id);
            return view('shelves.edit', compact('shelve'));
        }
    
        public function update(Request $request, Shelve $shelve)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' =>'required',
            ]);
    
            $shelve->update($request->all());
            return redirect()->route('shelves.show')->with('success', 'Rayon modifié avec succés.');
        }
    
        public function destroy(Shelve $shelve)
        {
            $shelve->delete();
            return redirect()->route('shelves.show')->with('success', 'Rayon supprimé avec succés .');
        }
    
    }
    