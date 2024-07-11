<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use App\Models\Organisation;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Trash', [
            'organisations' => Organisation::query()
                            ->onlyTrashed()
                            ->paginate(
                                $perPage = 10, $columns = ['*'], $pageName = 'organisations'
                            )->through(function($org) {
                                return [
                                    'id' => $org->id,
                                    'name' => $org->name
                                ];
                            })->withQueryString(),
            'contacts' => Contact::query()
                            ->onlyTrashed()
                            ->paginate(
                                $perPage = 10, $columns = ['*'], $pageName = 'contacts'
                            )->through(function($contact) {
                                return [
                                    'id' => $contact->id,
                                    'name' => $contact->name
                                ];
                            })->withQueryString(),
            'message' => $request->session()->get('message')
        ]);
    }
}
