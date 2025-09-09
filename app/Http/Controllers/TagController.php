<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all(); 
        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
         return view('tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
         $request->validate([
            'name'       => 'required|string|max:255',
        ]);
       
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tag.index')->with('success', 'Tag actualizada ✏️');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect()->route('tag.index', ['tag' => $tag])
            ->with('success', 'Tag eliminada 🗑️');
    }
}
