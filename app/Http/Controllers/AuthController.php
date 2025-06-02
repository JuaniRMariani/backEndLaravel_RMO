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
        $googleRequest = GoogleLoginRequestDTO::fromArray($request->toArray());
        $user = $this->authService->authenticateWithGoogle($googleRequest);

        return response()->json(new AuthResponseDTO($user->id, $user->token), 200);
    }
}