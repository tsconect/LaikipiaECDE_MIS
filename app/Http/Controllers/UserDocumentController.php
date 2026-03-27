<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\UserDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = UserDocument::where('user_id', auth()->user()->id)->latest()->get();

        return view('admin.user-documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Document::latest()->get();

        return view('admin.user-documents.create', compact('documents'));
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
            'document_id' => 'required',
            'file' => 'required',
        ]);



        $new = new UserDocument();
        $new->user_id = auth()->user()->id;
        $new->document_id = $request->document_id;
       

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'file/documents';
            $filePath = $request->file('file')->store($path, 'public');
            $new->file = $filePath;
        }
         $new->save();

     

        return redirect()->route('admin.user-documents.index')->with('success', 'Document uploaded successfully');

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDocument  $userDocument
     * @return \Illuminate\Http\Response
     */
    public function show(UserDocument $userDocument)
    {
        $documents = Document::latest()->get();
        return view('admin.user-documents.show', compact('userDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDocument  $userDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDocument $userDocument)
    {
        $documents = Document::latest()->get();
        return view('admin.user-documents.edit', compact('userDocument', 'documents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserDocument  $userDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDocument $userDocument)
    {
        $request->validate([
            'document_id' => 'required',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $userDocument->document_id = $request->document_id;

        if ($request->hasFile('file')) {
            if ($userDocument->file) {
                Storage::disk('public')->delete($userDocument->file);
            }
            $path = 'file/documents';
            $filePath = $request->file('file')->store($path, 'public');
            $userDocument->file = $filePath;
        }

        $userDocument->save();

        return redirect()->route('admin.user-documents.index')->with('success', 'Document updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDocument  $userDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDocument $userDocument)
    {
        if ($userDocument->file) {
            Storage::disk('public')->delete($userDocument->file);
        }

        $userDocument->delete();

        return redirect()->route('admin.user-documents.index')->with('success', 'Document deleted successfully');
    }
}
