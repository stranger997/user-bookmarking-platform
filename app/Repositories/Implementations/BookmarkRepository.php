<?php

namespace App\Repositories\Implementations;

use App\Repositories\Interfaces\BookmarkRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkRepository implements BookmarkRepositoryInterface
{
    /**
     * List all bookmarks order by title asc
     *
     * @return Collection|null
     */
    public function getBookmarks(): ?Collection
    {
        return Bookmark::orderBy('title')->get();
    }

    /**
     * Store Bookmark
     *
     * @param Request $request
     * @return Bookmark
     */
    public function create(Request $request): Bookmark
    {
        return Bookmark::create($request->all());
    }

    /**
     * Update Bookmark
     *
     * @param Request $request
     * @param Bookmark $bookmark
     * @return Bookmark
     */
    public function update(Request $request, Bookmark $bookmark): Bookmark
    {
        $bookmark->update($request->all());

        return $bookmark;
    }

    /**
     * Delete Bookmark
     *
     * @param Bookmark $bookmark
     * @return void
     */
    public function delete(Bookmark $bookmark): void
    {
        $bookmark->delete();
    }
}
