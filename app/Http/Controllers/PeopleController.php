<?php

namespace App\Http\Controllers;

use App\Exports\PeopleExport;
use App\Http\Controllers\Controller;
use App\Imports\PeopleImport;
use App\Models\People;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
    public function index(Request $request)
    {
        $query = People::query();

        // Filtrar por nombre (name)
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        // Filtrar por apellido (lastname)
        if ($request->has('lastname')) {
            $query->where('lastname', 'like', '%' . $request->input('lastname') . '%');
        }

        // Filtrar por email
        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        // Filtrar por provincia
        if ($request->has('province')) {
            $query->where('province', 'like', '%' . $request->input('province') . '%');
        }

        // Filtrar por código postal (zip_code)
        if ($request->has('zip_code')) {
            $query->where('zip_code', 'like', '%' . $request->input('zip_code') . '%');
        }

        // Filtrar por dirección (direction)
        if ($request->has('direction')) {
            $query->where('direction', 'like', '%' . $request->input('direction') . '%');
        }

        // Filtrar por sexo (sex)
        if ($request->has('sex')) {
            $query->where('sex', $request->input('sex'));
        }

        // Filtrar por edad (age)
        if ($request->has('age')) {
            $query->where('age', $request->input('age'));
        }

        // Filtrar por DNI
        if ($request->has('dni')) {
            $query->where('dni', 'like', '%' . $request->input('dni') . '%');
        }

        // Función de búsqueda
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('lastname', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%');
            });
        }

        $people = $query->paginate();

        return view('people.index', compact('people'))
            ->with('i', ($request->input('page', 1) - 1) * $people->perPage());
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

        $people = People::create($request->all());

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
        $people = People::find($id);

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
        $people = People::find($id);

        return view('people.edit', compact('people'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  People $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(People::$rules);

        $people = People::find($id);
        $people->fill($request->all());
        $people->save();

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
        $people = People::find($id)->delete();

        return redirect()->route('people.index')
            ->with('success', 'People deleted successfully');
    }
    public function export()
    {
        return Excel::download(new PeopleExport, 'people.xlsx');
    }
    public function import()
    {
        Excel::import(new PeopleImport, request()->file('file'));

        return redirect()->back()->with('success', 'Datos importados correctamente.');
    }
}
