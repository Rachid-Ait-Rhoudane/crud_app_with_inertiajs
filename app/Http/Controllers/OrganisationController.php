<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Organisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Organisation/Index', [
            'organisations' => Organisation::query()
                            ->when($request->input('search'), function ($query, $search) {
                                $query->where('name', 'LIKE', '%' . $search . '%');
                            })
                            ->paginate(10)
                            ->through(function($organisation) {
                                return [
                                    'id' => $organisation->id,
                                    'name' => $organisation->name,
                                    'city' => $organisation->city,
                                    'address' => $organisation->address,
                                    'email' => $organisation->email,
                                    'phone' => $organisation->phone
                                ];
                            })
                            ->withQueryString(),
            'filters' => $request->only(['search'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Organisation/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3'],
            'city' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'phone' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'country' => ['required']
        ]);

        Organisation::create($attributes);

        return redirect('/organisations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function show(Organisation $organisation)
    {
        return Inertia::render('Organisation/Show', [
            'organisation' => $organisation->load('contacts')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        return Inertia::render('Organisation/Edit', [
            'organisation' => $organisation
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3'],
            'city' => ['required', 'min:3'],
            'address' => ['required', 'min:3'],
            'phone' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'country' => ['required']
        ]);

        $organisation->update($attributes);

        return redirect('/organisations/'.$organisation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        Organisation::destroy($organisation->id);

        return redirect('/organisations');
    }
}
