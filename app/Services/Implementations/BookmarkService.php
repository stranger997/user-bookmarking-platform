<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\BookmarkServiceInterface;
use App\Repositories\Interfaces\BookmarkRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkService implements BookmarkServiceInterface
{
    private BookmarkRepositoryInterface $bookmarkRepository;

    /**
     * BookmarkService constructor
     */
    public function __construct(BookmarkRepositoryInterface $bookmarkRepository)
    {
        $this->bookmarkRepository = $bookmarkRepository;
    }

    /**
     * List all bookmarks order by title asc
     *
     * @return Collection|null
     */
    public function getBookmarks(): ?Collection
    {
        return $this->bookmarkRepository->getBookmarks();
    }

    /**
     * Store bookmark
     *
     * @param Request $request
     * @return Bookmark
     */
    public function createBookmarkForUser(Request $request): Bookmark
    {
        $request->merge([
            'user_id' => auth()->user()->id
        ]);

        return $this->bookmarkRepository->create($request);
    }

    /**
     * Update bookmark
     *
     * @param Request $request
     * @param Bookmark $bookmark
     * @return Bookmark
     */
    public function updateBookmark(Request $request, Bookmark $bookmark): Bookmark
    {
        return $this->bookmarkRepository->update($request, $bookmark);
    }

    /**
     * Delete bookmark
     *
     * @param Bookmark $bookmark
     * @return void
     */
    public function deleteBookmark(Bookmark $bookmark): void
    {
        $this->bookmarkRepository->delete($bookmark);
    }
}
