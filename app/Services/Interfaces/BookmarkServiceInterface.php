<?php

namespace App\Services\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Bookmark;

interface BookmarkServiceInterface
{
    public function getBookmarks(): ? Collection;

    public function createBookmarkForUser(Request $request): Bookmark;

    public function updateBookmark(Request $request, Bookmark $bookmark): Bookmark;

    public function deleteBookmark(Bookmark $bookmark): void;
}
