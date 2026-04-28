<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Abort with 403 if current user is not an admin.
     */
    protected function authorizeAdmin(): void
    {
        if (!auth()->user()?->isAdmin()) {
            abort(403, 'Only administrators can perform this action.');
        }
    }
}
