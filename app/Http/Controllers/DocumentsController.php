<?php

namespace App\Http\Controllers;

use App\Documents;
use App\Employee;
use App\Http\Requests\DocumentsRequest;

class DocumentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $documents = Documents::all();

        return view('documents.index', compact('documents'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $employees = Employee::current()
            ->orderBy('fullname', 'asc')
            ->get();

        return view('documents.create', compact('employees'));
    }

    /**
     * @param DocumentsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DocumentsRequest $request)
    {
        Documents::create($request->all());

        return redirect()
            ->route('documents.index')
            ->with('status', 'Document created!');
    }
}
