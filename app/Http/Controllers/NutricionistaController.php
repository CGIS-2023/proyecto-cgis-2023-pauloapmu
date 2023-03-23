<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutricionistaController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Nutricionista::class, 'nutricionista');
    }

    public function index()
    {
        $nutricionistas = Nutricionista::paginate(25);
        return view('/nutricionistas/index', ['nutricionistas' => $nutricionistas]);
    }
    
    //
    public function create()
    {
        return view('nutricionistas/create');
    }

    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'n_licencia' => 'required|numeric',
            'telefono' => 'required|numeric',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $nutricionista = new Nutricionista($request->all());
        $nutricionista->user_id = $user->id;
        $nutricionista->save();
        session()->flash('success', 'Nutricionista creado correctamente.');
        return redirect()->route('nutricionistas.index');
    }

    //
    public function show(Nutricionista $nutricionista)
    {
        return view('nutricionistas/show', ['nutricionista' => $nutricionista]);
    }

    //
    public function edit(Nutricionista $nutricionista)
    {
        return view('nutricionistas/edit', ['nutricionista' => $nutricionista]);
    }

    //
    public function update(Request $request, Nutricionista $nutricionista)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'n_licencia' => 'required|numeric',
            'telefono' => 'required|numeric|max:9',
        ]);
        $user = $nutricionista->user;
        $user->fill($request->all());
        $user->save();
        $nutricionista->fill($request->all());
        $nutricionista->save();
        session()->flash('success', 'Nutricionista modificado correctamente.');
        return redirect()->route('nutricionistas.index');
    }

    //
    public function destroy(Nutricionista $nutricionista)
    {
        if($nutricionista->delete()) {
            session()->flash('success', 'Nutricionista borrado correctamente.');
        }
        else{
            session()->flash('warning', 'El nutricionista no pudo borrarse.');
        }
        return redirect()->route('nutricionistas.index');
    }


}
