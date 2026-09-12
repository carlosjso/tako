<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Credenciales inválidas',
            ], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        return DB::transaction(function () use ($validated){
            $business = Business::create([
                'name' => $validated['business_name'], 
                'address' => $validated['business_address'], 
                'email' => $validated['business_email'], 
                'phone' => $validated['business_phone'], 
                'currency' => $validated['business_currency'] ?? 'MXN',
            ]);
            
            $user = new User([
                'name' => $validated['user_name'], 
                'email' => $validated['user_email'], 
                'phone' => $validated['user_phone'],
                'password' => $validated['user_password'],
            ]);
            $user->business_id = $business->id;
            $user->role = 'owner';
            $user->is_active = true;
            $user->save();

            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'business' => $business,
                'user' => $user,
                'token' => $token,
            ], 201);
        });
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
