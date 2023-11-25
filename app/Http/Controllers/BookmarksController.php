<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarksController extends Controller
{
    public function index()
    {
        // Fetch all bookmarks from the database
        $bookmarks = Bookmark::orderBy('title', 'asc')->get();

        // Return the view with the bookmarks data
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function create()
    {
        // Show the form for creating a new bookmark
        return view('bookmarks.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
        ]);
    
        // Create a new bookmark with the validated data and associate it with the currently authenticated user
        $bookmark = new Bookmark([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
        ]);
    
        // Associate the bookmark with the currently authenticated user
        auth()->user()->bookmarks()->save($bookmark);
    
        // Redirect to the index page after creating the bookmark
        return redirect('/bookmarks');
    }

    public function edit(Bookmark $bookmark)
    {
        // Show the form for editing an existing bookmark
        return view('bookmarks.edit', compact('bookmark'));
    }

    public function update(Request $request, Bookmark $bookmark)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);
    
        // Update the existing bookmark
        $bookmark->update([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
        ]);
    
        // Redirect to the index page after updating the bookmark
        return redirect(route('bookmarks.index'))->with('success', 'Bookmark updated successfully');
    }

    public function deleteConfirmation (Bookmark $bookmark)
    {
        // Show the form for deleting an existing bookmark
        return view('bookmarks.delete', compact('bookmark'));

    }
    public function destroy(Bookmark $bookmark)
    {
        //Delete the selected bookmark
        $bookmark->delete();
    
        // Redirect to the index page after deleting the bookmark
        return redirect('/bookmarks');
    }
}
