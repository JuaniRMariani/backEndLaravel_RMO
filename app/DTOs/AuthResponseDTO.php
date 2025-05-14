<?php

namespace App\DTOs;

class AuthResponseDTO{

    public string $id;
    public string $token;

    public function __construct(string $id, string $token){
        $this->id = $id;
        $this->token = $token;
    }

    public function toArray(): array{
        return [
            'id' => $this->id,
            'token' => $this->token,
        ];
    }
}