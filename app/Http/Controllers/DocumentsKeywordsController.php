<?php

namespace App\Http\Controllers;

use App\DocumentsKeywords;
use Illuminate\Http\Request;

class DocumentsKeywordsController extends Controller
{
    /**
     * Display all keywords.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keywords = DocumentsKeywords::orderBy('keyword', 'asc')->get();

        return view('documents-keywords.index', compact('keywords'));
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
     * Show the form for editing the specified resource.
     *
     * @param DocumentsKeywords $keyword
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentsKeywords $keyword)
    {
        return view('documents-keywords.edit', compact('keyword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
