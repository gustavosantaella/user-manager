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

        // Función de búsqueda en todos los campos
        $searchTerm = $request->input('search_query');
        if (!empty($searchTerm)) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('lastname', 'like', '%' . $searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $searchTerm . '%')
                    ->orWhere('province', 'like', '%' . $searchTerm . '%')
                    ->orWhere('zip_code', 'like', '%' . $searchTerm . '%')
                    ->orWhere('direction', 'like', '%' . $searchTerm . '%')
                    ->orWhere('sex', 'like', '%' . $searchTerm . '%')
                    ->orWhere('age', 'like', '%' . $searchTerm . '%')
                    ->orWhere('dni', 'like', '%' . $searchTerm . '%')
                    ->orWhere('date_birth', 'like', '%' . $searchTerm . '%');
            });
        }

        // Aplicar filtros seleccionados en el modal
        if ($request->has('filters')) {
            $filters = $request->input('filters');

            // Verifica qué filtros se han seleccionado y aplica las condiciones correspondientes
            if (in_array('name', $filters)) {
                $query->whereNotNull('name');
            }
            if (in_array('lastname', $filters)) {
                $query->whereNotNull('lastname');
            }
            if (in_array('province', $filters)) {
                $query->whereNotNull('province');
            }
            if (in_array('zip_code', $filters)) {
                $query->whereNotNull('zip_code');
            }
            if (in_array('dni', $filters)) {
                $query->whereNotNull('dni');
            }
            if (in_array('direction', $filters)) {
                $query->whereNotNull('direction');
            }
            if (in_array('sex', $filters)) {
                $query->whereNotNull('sex');
            }
            if (in_array('age', $filters)) {
                $query->whereNotNull('age');
            }
            if (in_array('date_birth', $filters)) {
                $query->whereNotNull('date_birth');
            }
        }

        $people = $query->paginate();
        $persons = $query->paginate();

        return view('people.index', compact('people', 'persons'))
            ->with('i', ($request->input('page', 1) - 1) * $persons->perPage());
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
