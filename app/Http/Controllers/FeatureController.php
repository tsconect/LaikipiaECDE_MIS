<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $features = Feature::orderBy('position')->get();

        return view('admin.features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.features.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'icon' => 'nullable',
            'icon_color' => 'nullable',
            'layout' => 'required',
            'overlay_title' => 'nullable',
            'overlay_description' => 'nullable',
            'position' => 'nullable|integer',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('features', 'public');
        }

        Feature::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'icon' => $request->icon,
            'icon_color' => $request->icon_color,
            'layout' => $request->layout,
            'overlay_title' => $request->overlay_title,
            'overlay_description' => $request->overlay_description,
            'position' => $request->position ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function show(Feature $feature)
    {
        return view('admin.features.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function edit(Feature $feature)
    {
        return view('admin.features.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'icon' => 'nullable',
            'icon_color' => 'nullable',
            'layout' => 'required',
            'overlay_title' => 'nullable',
            'overlay_description' => 'nullable',
            'position' => 'nullable|integer',
        ]);
        
        $imagePath = $feature->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('features', 'public');
        }

        $feature->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'icon' => $request->icon,
            'icon_color' => $request->icon_color,
            'layout' => $request->layout,
            'overlay_title' => $request->overlay_title,
            'overlay_description' => $request->overlay_description,
            'position' => $request->position ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feature  $feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature deleted successfully.');
    }
}
