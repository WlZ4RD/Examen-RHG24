<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Personal;
use App\Rules\AlphaSpaceRule;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::Where('Estado', '=', '1')->get();
        return view('contrato.index')->with('contratos', $contratos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contrato.create');
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
            'personal_id' => ['required', 'integer'],
            'Cargo' => ['required'],
            'Local' => ['required'],
            'Local' => ['required'],
            'Inicio' => ['required', 'date'],
            'Fin' => ['required', 'date'],
            'Tipo' => ['required', 'integer'],
        ]);
        $contrato = Contrato::create($request->all());
        return redirect()->route('contrato.show', $contrato->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function show(Contrato $contrato)
    {
        $personal = $contrato->personal;
        return view('contrato.show', compact('contrato', 'personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contrato $contrato)
    {
        return view('contrato.edit')->with('contrato', $contrato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'personal_id' => ['required', 'integer'],
            'Cargo' => ['required'],
            'Local' => ['required'],
            'Local' => ['required'],
            'Inicio' => ['required', 'date'],
            'Fin' => ['required', 'date'],
            'Tipo' => ['required', 'integer'],
        ]);

        $contrato->update($request->all());
        return view('contrato.show')->with('contrato', $contrato);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contrato $contrato)
    {
        $this->authorize(false);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        $DNIS = Personal::select('id', 'DNI')->where('DNI', 'LIKE', '%' . $search . '%')->get();

        return response()->json([
            'message' => $DNIS->isEmpty() ? 'No se encontraron resultados' : 'Se encontraron resultados',
            'data' => $DNIS ?? []
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contrato  $contrato
     * @return \Illuminate\Http\Response
     */
    public function delete(Contrato $contrato)
    {
        return view('contrato.delete')->with('contrato', $contrato);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function eliminate(Contrato $contrato)
    {
        $contrato->Estado = 2;
        $contrato->save();
        return redirect()->route('contrato.index');
    }
}
