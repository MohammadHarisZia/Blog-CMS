<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WriterController extends Controller
{
    public function index()
    {
        $this->authorize(UserPolicy::SUPERADMIN, User::class);
        return view('admin.writers.index', [
            'users' => User::where('type', User::WRITER)->paginate(5),
        ]);
    }
}
