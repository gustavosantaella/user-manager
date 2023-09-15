<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\People;
use Illuminate\Http\Request;

/**
 * Class PeopleController
 * @package App\Http\Controllers
 */
class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::paginate(20);

        return view('people.index', compact('people'))
            ->with('i', (request()->input('page', 1) - 1) * $people->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $people = new People();
        return view('people.create', compact('people'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(People::$rules);

        // Crea una instancia de People con los datos proporcionados
        $peopleData = $request->only(['name', 'lastname', 'email', 'province', 'zip_code', 'direction', 'sex', 'age', 'dni']);

        // Verifica si se proporciona la fecha de nacimiento en el formulario
        if ($request->filled('date_birth')) {
            $peopleData['date_birth'] = $request->input('date_birth');
        }

        // Crea el registro en la base de datos
        $people = People::create($peopleData);

        return redirect()->route('people.index')
            ->with('success', 'People created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people = People::findOrFail($id);

        return view('people.show', compact('people'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $people = People::findOrFail($id);

        return view('people.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  People $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, People $people)
    {
        // Valida los campos requeridos y otras reglas de validación
        $request->validate([
            'name' => 'required|string|max:255',
            // Otras reglas de validación para otros campos si los hay
        ]);

        // Actualiza los datos de People con los valores proporcionados en el formulario
        $peopleData = $request->only(['name', 'lastname', 'email', 'province', 'zip_code', 'direction', 'sex', 'age', 'dni']);

        // Verifica si se proporciona la fecha de nacimiento en el formulario
        if ($request->filled('date_birth')) {
            $peopleData['date_birth'] = $request->input('date_birth');
        } else {
            // Si no se proporciona fecha de nacimiento, establece el campo como null
            $peopleData['date_birth'] = null;
        }

        // Actualiza el registro en la base de datos
        $people->update($peopleData);

        return redirect()->route('people.index')
            ->with('success', 'People updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $people = People::findOrFail($id)->delete();

        return redirect()->route('people.index')
            ->with('success', 'People deleted successfully');
    }
}
