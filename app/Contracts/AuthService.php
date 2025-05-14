<?php

namespace App\Contracts;

use App\DTOs\UserDTO;
use App\DTOs\GoogleLoginRequestDTO;

interface AuthService{

    public function authenticateWithGoogle(GoogleLoginRequestDTO $requestGoogle): ?UserDTO;

    public function generateJwtToken(string $userEmail): string;
}
    
