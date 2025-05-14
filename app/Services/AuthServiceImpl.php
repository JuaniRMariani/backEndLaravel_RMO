<?php

namespace App\Services;

use App\Contracts\AuthService;
use App\DTOs\GoogleLoginRequestDTO;
use App\DTOs\UserDTO;
use App\Models\User;
use Exception;
use Google_Client;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthServiceImpl implements AuthService{

    public function authenticateWithGoogle(GoogleLoginRequestDTO $requestGoogle): UserDTO{
        try{
            $client = new Google_Client();
            $client->setClientId(config('services.google.client_id'));
            $client->setClientSecret(config('services.google.client_secret'));
            $payload = $client->verifyIdToken($requestGoogle->tokenId);

            if(!$payload || $payload['sub'] !== $requestGoogle->googleId || $payload['email'] !== $requestGoogle->userEmail) {
                throw new Exception('Invalid ID token');
            }

            $user = User::updateOrCreate(
                ['google_id' => $requestGoogle->googleId],
                [
                    'name' => $requestGoogle->userName,
                    'email' => $requestGoogle->googleId,
                ]
            );

            return new UserDTO(
                $user->id,
                $user->name,
                $user->email,
                $this->generateJwtToken($user->email)
            );
        
        } catch (Exception $e) {
            throw new Exception('Google Authentication failed: ' . $e->getMessage());
        }
    }
    public function generateJwtToken(string $userEmail): string{
        try{
            $user = User::where('email', $userEmail)->firstOrFail();
            return JWTAuth::fromUser($user);
        }catch(Exception $e){
            throw new Exception('Token generation failed: ' . $e->getMessage());
        }
    }

}