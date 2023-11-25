<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Collection;

interface BookmarkRepositoryInterface
{
    public function getBookmarks(): ?Collection;

    public function create(Request $request): Bookmark;

    public function update(Request $request, Bookmark $bookmark): Bookmark;

    public function delete(Bookmark $bookmark): void;
}
