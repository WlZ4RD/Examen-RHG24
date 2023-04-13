<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Rules\AlphaSpaceRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personales = Personal::Where('Estado', '=', 1)->get();
        return view('personal.index')->with('personales', $personales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombres' => ['required', new AlphaSpaceRule(), 'max:191'],
            'Apellidos' => ['required', new AlphaSpaceRule(), 'max:191'],
            'Correo' => ['required','email'],
            'DNI' => ['required', 'digits:8', 'unique:personals'],
            'fechaNacimiento' => ['required', 'date'],
        ]);
        $personal = Personal::create($request->all());
        return redirect()->route('personal.show', $personal->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return view('personal.show')->with('personal', $personal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        return view('personal.edit')->with('personal', $personal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'Nombres' => ['required', new AlphaSpaceRule(), 'max:191'],
            'Apellidos' => ['required', new AlphaSpaceRule(), 'max:191'],
            'Correo' => ['required','email'],
            'DNI' => ['required', 'digits:8', Rule::unique('users')->ignore($personal->id)],
            'fechaNacimiento' => ['required', 'date'],
        ]);
        $personal->update($request->all());
        return view('personal.show')->with('personal', $personal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function delete(Personal $personal)
    {
        return view('personal.delete')->with('personal', $personal);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function eliminate(Personal $personal)
    {
        $personal->Estado = 2;
        $personal->save();
        return redirect()->route('personal.index');
    }
}
