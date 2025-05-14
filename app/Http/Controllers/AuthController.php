<?php

namespace App\Http\Controllers;

use App\Contracts\AuthService;
use App\DTOs\GoogleLoginRequestDTO;
use App\DTOs\AuthResponseDTO;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class AuthController extends Controller{

    private $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function googleLogin(Request $request): JsonResponse{
        $validated = $request->validate([
            'tokenId' => 'required|string',
            'userEmail' => 'required|email',
            'userName' => 'required|string',
            'googleId' => 'required|string',
        ]);

        $googleRequest = GoogleLoginRequestDTO::fromArray($validated);
        $user = $this->authService->authenticateWithGoogle($googleRequest);
        $token = $this->authService->generateJwtToken($user->email);

        return response()->json(new AuthResponseDTO($user->id, $token), 200);
    }
}