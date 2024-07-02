<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Contact/Index', [
            'contacts' => Contact::query()
                                ->when($request->input('filter'), function ($query, $filter) {

                                    if($filter == 'only trashed') {

                                        return $query->onlyTrashed();
                                    }

                                    return $query->withTrashed();
                                })
                                ->when($request->input('search'), function ($query, $search) {
                                    $query->where('name', 'LIKE', '%' . $search . '%');
                                })
                                ->paginate(10)
                                ->through(function($contact) {
                                    return [
                                        'id' => $contact->id,
                                        'name' => $contact->name,
                                        'city' => $contact->city,
                                        'organisation' => $contact->organisation->name,
                                        'phone' => $contact->phone
                                    ];
                                })
                                ->withQueryString(),
            'filters' => $request->only(['search', 'filter']),
            'message' => $request->session()->get('message')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Contact/Create', [
            'organisations' => Organisation::all()->map(fn($org) => [
                'id' => $org->id,
                'name' => $org->name
            ])
        ]);
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
            'organisation' => ['required'],
            'phone' => ['required', 'min:10', 'max:10']
        ]);

        Contact::create([...$attributes,
            'organisation_id' => $attributes['organisation']
        ]);

        return redirect('/contacts')->with('message', 'new contact created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Contact $contact)
    {
        return Inertia::render('Contact/Show', [
            'contact' => $contact->load('organisation'),
            'isTrashed' => $contact->trashed(),
            'message' => $request->session()->get('message')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return Inertia::render('Contact/Edit', [
            'organisations' => Organisation::all()->map(fn($org) => [
                                    'id' => $org->id,
                                    'name' => $org->name
                                ]),
            'contact' => $contact->load('organisation')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
