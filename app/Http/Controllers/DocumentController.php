<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::latest()->get();

        log_user_activity(0, 'documents', 'index', 'User accessed the documents index page', 'admin/documents');

        return view('admin.documents.index', compact('documents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log_user_activity(0, 'documents', 'create', 'User accessed the documents create page', 'admin/documents/create');
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_required' => 'required',
        ]);

        $document = new Document();
        $document->name = $request->name;
        $document->is_required = $request->is_required;

        $document->save();

        log_user_activity($document->id, 'documents', 'store', 'User created a new document: ' . $document->name, url()->current(), json_encode($document));

        return redirect()->route('admin.documents.index')->with('success', 'Document created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        log_user_activity($document->id, 'documents', 'show', 'User viewed document with id ' . $document->id, url()->current(), json_encode($document));
        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        log_user_activity($document->id, 'documents', 'edit', 'User accessed edit page for document: ' . $document->name, 'admin/documents/' . $document->id . '/edit', json_encode($document));
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required',
            'is_required' => 'required',
        ]);

        $current_object = json_encode($document);

        $document->name = $request->name;
        $document->is_required = $request->is_required;
        $document->save();

        log_user_activity($document->id, 'documents', 'update', 'User updated document with id ' . $document->id, url()->current(), json_encode($document), $current_object);

        return redirect()->route('admin.documents.index')->with('success', 'Document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $oldDocument = json_encode($document);
        $documentId = $document->id;
        $document->delete();

        log_user_activity($documentId, 'documents', 'destroy', 'User deleted document with id ' . $documentId, url()->current(), null, $oldDocument);

        return redirect()->route('admin.documents.index')->with('success', 'Document deleted successfully.');
    }
}
