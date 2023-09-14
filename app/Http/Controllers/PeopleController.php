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
        $people = People::paginate();

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
    public function update(Request $request, People $people)
    {
        request()->validate(People::$rules);

        $people->update($request->all());

        return redirect()->route('people.index')
            ->with('success', 'People updated successfully');
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
}
