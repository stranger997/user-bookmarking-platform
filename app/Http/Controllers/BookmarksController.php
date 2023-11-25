<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Services\Interfaces\BookmarkServiceInterface;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\BookmarkRequest;
use Session;

class BookmarksController extends Controller
{
    private BookmarkServiceInterface $bookmarkService;

    /**
     * BookmarkController constructor
     */
    public function __construct(BookmarkServiceInterface $bookmarkService)
    {
        $this->bookmarkService = $bookmarkService;
    }


    public function index()
    {
        // Fetch all bookmarks from the database
        $bookmarks = $this->bookmarkService->getBookmarks();

        // Return the view with the bookmarks data
        return view('bookmarks.index', compact('bookmarks'));
    }

    public function create()
    {
        // Show the form for creating a new bookmark
        return view('bookmarks.create');
    }

    public function store(BookmarkRequest $request)
    {
        $bookmark = $this->bookmarkService->createBookmarkForUser($request);

        Session::flash('message', 'This is a message!');
        // Redirect to the index page after creating the bookmark
        return redirect(route('bookmarks.index'))->with('success', 'Bookmark created successfully');
    }

    public function edit(Bookmark $bookmark)
    {
        // Show the form for editing an existing bookmark
        return view('bookmarks.edit', compact('bookmark'));
    }

    public function update(BookmarkRequest $request, Bookmark $bookmark)
    {
        $this->bookmarkService->updateBookmark($request, $bookmark);

        // Redirect to the index page after updating the bookmark
        return redirect(route('bookmarks.index'))->with('success', 'Bookmark updated successfully');
    }

    public function deleteConfirmation(Bookmark $bookmark)
    {
        // Show the form for deleting an existing bookmark
        return view('bookmarks.delete', compact('bookmark'));
    }

    public function destroy(Bookmark $bookmark)
    {

        // Check if the authenticated user is not the owner of the bookmark
        if (Gate::denies('deleteBookmark', $bookmark)) {
            // If the user is not authorized, return to the same page with an error message
            return redirect()->back()->with('error', 'Unauthorized to delete this bookmark');
        }

        // Delete the bookmark
        $this->bookmarkService->deleteBookmark($bookmark);

        // Redirect to the index page after deleting the bookmark
        return redirect(route('bookmarks.index'))->with('success', 'Bookmark deleted successfully');
    }
}
