<?php

namespace App\Http\Controllers;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index(Request $request)
    {
        $logins = Login::all();
        return view('login.index', compact('logins'));
    }

    public function authentification_page()
    {
        return view('login.connecter');
    }
    public function login(Request $request){
        $login = $request->Log;
        $password = $request->Pass;
        $credentials = ['email' => $login , 'password' => $password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return view('layouts.app');
        }else{
            return back()->withErrors(['Log'=>'Email ou Mot de passe incorrect!'])->onlyInput('Log');
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login.authentification');
    } 


    public function store(Request $request)
    {
        $request->validate([
            'Log' => 'required|string|max:100',
            'Pass' => 'required|string|max:100',
        ]);

        Login::create([
            'Log' => $request->Log,
            'Pass' => $request->Pass,
        ]);

        return redirect()->route('logins.index')->with('success', 'Login ajouté avec succès.');
    }

    public function show()
    {
        $login = Login::all();
        return view('login.show', compact('login'));
    }
/*
  public function edit($id)
    {
        $login = Login::findOrFail($id);
        return view('login.edit', compact('login'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Log' => 'required|string|max:100',
            'Pass' => 'required|string|max:100',
        ]);

        $login = Login::findOrFail($id);
        $login->update([
            'Log' => $request->Log,
            'Pass' => $request->Pass,
        ]);

        return redirect()->route('logins.index')->with('success', 'Login mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $login = Login::findOrFail($id);
        $login->delete();

        return redirect()->route('logins.index')->with('success', 'Login supprimé avec succès.');
    }*/
}
