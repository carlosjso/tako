<?php

namespace App\Http\Api\Users\Controllers;

use App\Domain\Users\Models\User;
use App\Http\Api\Controller;
use App\Http\Api\Users\Requests\StoreUserRequest;
use App\Http\Api\Users\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::forCurrentBusiness()->get();
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = new User($validated);
        $user->business_id = Auth::user()->business_id;
        $user->role = 'waiter';
        $user->is_active = true;
        $user->save();

        return response()->json($user, 201);
    }

    public function show(string $id)
    {
        return User::forCurrentBusiness()->findOrFail($id);
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::forCurrentBusiness()->findOrFail($id);
        $user->update($request->validated());

        return $user;
    }

    public function destroy(string $id)
    {
        $user = User::forCurrentBusiness()->findOrFail($id);
        $user->delete();

        return response()->noContent();
    }
}
