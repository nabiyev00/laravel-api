<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login user and return token
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            // Check rate limiting (max 5 attempts per IP)
            if (RateLimiter::tooManyAttempts('login:' . $request->ip(), 5)) {
                return $this->error('Too many login attempts. Please try again later.', 429);
            }

            // Find user by email
            $user = User::where('email', $request->email)->first();

            // Check password and user existence
            if (!$user || !Hash::check($request->password, $user->password)) {
                RateLimiter::hit('login:' . $request->ip());
                return $this->error('The provided credentials are incorrect.', 401);
            }

            // Check if email is verified
            if (!$user->hasVerifiedEmail()) {
                return $this->error('Your email is not verified.', 403);
            }

            // Generate API token
            $token = $user->createToken('API Token')->plainTextToken;

            // Log user login details
            LoginLog::create([
                'user_id' => $user->id,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return $this->success("Authenticate success", 200, [
                'token' => $token,
                'user' => new UserResource($user)
            ]);
        } catch (\Exception $e) {
            Log::error("Login error: " . $e->getMessage());
            return $this->error('Internal server error', 500);
        }
    }

    /**
     * Register a new user
     */
    public function register(Request $request): JsonResponse
    {
        try {
            // Validate request
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ]);

            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return $this->success("Registration successful", 201, [
                'user' => new UserResource($user),
                'token' => $user->createToken('API Token')->plainTextToken,
            ]);
        } catch (ValidationException $e) {
            return $this->error('Validation error', 422, ['errors' => $e->errors()]);
        } catch (\Exception $e) {
            Log::error("Registration error: " . $e->getMessage());
            return $this->error('Internal server error', 500);
        }
    }

    /**
     * Logout user and delete token
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->success('Logout successful');
        } catch (\Exception $e) {
            Log::error("Logout error: " . $e->getMessage());
            return $this->error('Internal server error', 500);
        }
    }

    /**
     * Get authenticated user data
     */
    public function user(Request $request): JsonResponse
    {
        return $this->success('User retrieved successfully', 200, [
            'user' => new UserResource($request->user())
        ]);
    }
}
