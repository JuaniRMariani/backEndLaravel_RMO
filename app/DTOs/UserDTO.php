<?php

namespace App\DTOs;

use App\Models\User;

class UserDTO{
    public string $id;
    public string $email;
    public string $name;
    public string $token;

    public function __construct(string $id, string $email, string $name, string $token){
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
    }
    public static function fromModel(User $user): self{
        return new self(
            id: $user->id,
            email: $user->email,
            name: $user->name,
            token: $user->token
        );
    }

    public function toArray(): array{
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => $this->name,
            'token' => $this->token
        ];
    }

    
}