<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarksController extends Controller
{
    public function index()
    {
        // Fetch all bookmarks from the database
        $bookmarks = Bookmark::all();

        // Return the view with the bookmarks data
        return view('bookmarks.index', compact('bookmarks'));
    }
}
