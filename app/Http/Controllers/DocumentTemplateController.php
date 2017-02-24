<?php

namespace App\Http\Controllers;

use App\Documents\Keywords;
use App\DocumentTemplate;
use App\Http\Requests\DocumentTemplateRequest;
use Illuminate\Http\Request;

class DocumentTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = DocumentTemplate::all();

        return view('documents-templates.index', compact('templates'));
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display template.
     *
     * @param DocumentTemplate $template
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentTemplate $template)
    {
        $keywords = Keywords::extract($template->content);

        return view('documents-templates.show', compact('template', 'keywords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DocumentTemplate $template
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentTemplate $template)
    {
        return view('documents-templates.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DocumentTemplateRequest $request
     * @param DocumentTemplate $template
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentTemplateRequest $request, DocumentTemplate $template)
    {
        $template->update($request->all());

        return redirect()
            ->route('documentTemplates.show', $template)
            ->with('status', 'Template updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
