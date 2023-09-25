<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::where('id', '!=', Auth::id());
        if (request('search')) {
            $users = $users->where('name', 'LIKE', "%" . request('search') . "%")
                ->orWhere('email', 'LIKE', "%" . request('search') . "%")
                ->orWhere('social_type', 'LIKE', "%" . request('search') . "%");
        }
        $users = $users->withCount('cards')->with('cards')->orderBy('role','DESC')->paginate(20);
        return view('admin.users', compact('users'));
    }
    public function transfer(User $user)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    }
    public function changeRole($id)
    {
        // dd(request()->input('role'));
        $user = User::where('id', $id)->first();
        // dd($user);
        $user->update(['role' => request()->input('role')]);
        return redirect()->back();
    }
    public function editPassword($id)
    {
        $user = User::where('id', $id)->first();
        // dd($user);
        $user->update(['password' => Hash::make(request()->input('password'))]);
        // return redirect()->back();
        return response()->json(['message' => 'Password updated successfully'], 200);
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
