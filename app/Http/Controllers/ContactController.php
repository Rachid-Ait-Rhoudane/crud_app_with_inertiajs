<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
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
