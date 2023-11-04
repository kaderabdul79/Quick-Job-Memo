<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // user registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['token' => $token, 'data' => $user]);
        } catch (\Exception $e) {
            $response = ResponseHelper::errorResponse("Registration failed.", 500);
            return response()->json($response);
        }
    }

    // user login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('app-login-token')->plainTextToken;

            return response()->json(['token' => $token, 'data' => $user], 200);
        }
        $response = ResponseHelper::errorResponse("Invalid credentials.", 401);
        return response()->json($response);
    }

    // if token match provide user details handle by snactum middleware
    public function getUser(Request $request)
    {
        try {
            $user = $request->user();

            if ($user) {
                $response = ResponseHelper::successResponse('User details', $data = $user);
                return response()->json($response);
            } else {
                $response = ResponseHelper::errorResponse("User not authenticated.", 401);
                return response()->json($response);
            }
        } catch (\Exception $e) {
            $response = ResponseHelper::errorResponse("Unable to fetch user data.", 500);
            return response()->json($response);
        }
    }

    // if token match logout the authenticate user
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();

            $response = ResponseHelper::successResponse('Logout successful');
            return response()->json($response);
            } catch (\Exception $e) {
                $response = ResponseHelper::errorResponse("Failed to logout.", 401);
                return response()->json($response);
            }
    }

    // update user profile information
    public function updateProfile(Request $request, $id){
        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'designation' => 'nullable|string',
        //     'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'about' => 'nullable|string',
        // ]);
//  return $request->input('name');
    
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->designation = $request->input('designation');
        $user->about = $request->input('about');

        // Handle file upload
        if ($request->hasFile('picture')) {
            return $request->picture;
            $file = $request->file('picture');
            $path = $file->store('profile_pictures', 'public');
            $user->picture = $path;
        }
        $user->save();
        $response = ResponseHelper::successResponse('User information updated successfully', $data = $user);
        return response()->json($response);
    }
}
