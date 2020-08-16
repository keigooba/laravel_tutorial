<?php

namespace App\Policies;

use App\Models\User;
use App\Folder;


class FolderPolicy
{

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Folder $folder)
    {
        return $user->id === $folder->user_id;
    }
    
}
