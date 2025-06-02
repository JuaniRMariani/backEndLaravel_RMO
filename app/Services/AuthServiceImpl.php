<?php

namespace App\Services;

use App\Contracts\AuthService;
use App\DTOs\GoogleLoginRequestDTO;
use App\DTOs\UserDTO;
use App\Models\User;
use Exception;
use Google_Client;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Validator;

class AuthServiceImpl implements AuthService{

    public function authenticateWithGoogle(GoogleLoginRequestDTO $requestGoogle): UserDTO{
        try{
            $this->validateUserData($requestGoogle->toArray());
            $payload = $this->validateGoogleToken($requestGoogle->tokenId);

            if(!$payload) {
                throw new Exception('Invalid ID token');
            }

            $user = $this->userToDataBase($requestGoogle);

            return $this->userToDTO($user);
        
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

    private function userToDTO(User $user): UserDTO{
        return new UserDTO(
            $user->id,
            $user->name,
            $user->email,
            $this->generateJwtToken($user->email)
        );
    }

    private function validateGoogleToken($tokenId): bool{
        $client = new Google_Client();
        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));
        $client->addScope(config('services.google.scope'));
        $payload = $client->verifyIdToken($tokenId);

        return $payload !== null;
    }

    private function userToDataBase(GoogleLoginRequestDTO $requestGoogle): User{
       return User::updateOrCreate(
                ['googleId' => $requestGoogle->googleId],
                [
                    'name' => $requestGoogle->userName,
                    'email' => $requestGoogle->userEmail,
                ]
        );
    }

    private function validateUserData(array $data): void{
        logger()->info("Validando datos de usuario", $data);
        $rules = [
            'googleId' => 'required|string',
            'userName' => 'required|string',
            'userEmail' => 'required|email',
        ];

        Validator::make($data, $rules)->validate();
    }


}