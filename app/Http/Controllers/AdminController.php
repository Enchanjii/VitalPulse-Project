<?php

namespace App\Http\Controllers;

use App\Models\Movement;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Dashboard
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalMovements = Movement::count();
        $userCount = User::where('role', 'user')->count();
        $adminCount = User::where('role', 'admin')->count();

        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalMovements' => $totalMovements,
            'userCount' => $userCount,
            'adminCount' => $adminCount,
        ]);
    }

    // Movement Management
    public function listMovements()
    {
        $movements = Movement::all();
        return view('admin.movements.index', ['movements' => $movements]);
    }

    public function createMovement()
    {
        return view('admin.movements.create');
    }

    public function storeMovement(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        Movement::create($validated);
        return redirect('/admin/movements')->with('success', 'Movement created successfully');
    }

    public function editMovement($id)
    {
        $movement = Movement::findOrFail($id);
        return view('admin.movements.edit', ['movement' => $movement]);
    }

    public function updateMovement(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'instructions' => 'nullable|string',
        ]);

        $movement = Movement::findOrFail($id);
        $movement->update($validated);
        return redirect('/admin/movements')->with('success', 'Movement updated successfully');
    }

    public function deleteMovement($id)
    {
        Movement::destroy($id);
        return redirect('/admin/movements')->with('success', 'Movement deleted successfully');
    }

    // User Management
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);
        return redirect('/admin/users')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect('/admin/users')->with('success', 'User deleted successfully');
    }
}
