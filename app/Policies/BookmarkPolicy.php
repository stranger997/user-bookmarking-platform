<?php

namespace App\Policies;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookmarkPolicy
{
    /**
     * Determine whether the user can delete the model.
     */
    public function deleteBookmark(User $user, Bookmark $bookmark): bool
    {
        return $user->id === $bookmark->user_id;
    }
}
