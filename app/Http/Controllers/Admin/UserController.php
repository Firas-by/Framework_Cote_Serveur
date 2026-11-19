<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    public function toggleRole(Request $request, User $user): RedirectResponse
    {
        if ($request->user()->id === $user->id) {
            abort(403, 'Vous ne pouvez pas modifier votre propre rôle.');
        }

        $user->role = $user->role === 'admin' ? 'author' : 'admin';
        $user->save();

        return back()->with('success', 'Rôle de l\'utilisateur mis à jour.');
    }
}
