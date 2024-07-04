<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(){
        return view('signup');
    }

    public function signupPost(Request $request){
        $user = new user();
        
        $user->name=$request->name;
        $user->email = $request->email;
        $user->password=Hash::make($request->password);

        $user->save();

        return Back()->with('success', 'Compte crée avec succés connectez vous');
    }

    public function login(){
        return view('login');
    }
    
    public function loginPost(Request $request){
       $credentials = [
        'email'=> $request->email,
        'password' => $request->password,
       ];
       if(Auth::attempt($credentials)){
           return redirect()->route('books.show')->with('success', 'Connexion réussie');
       }
       return back()->with('error', 'Email ou mot de passe incorrecte');
  }  

  public function logout (){
    Auth::logout();
    return redirect()->route('login');
  }
}
