<?php

namespace App\DTOs;

class GoogleLoginRequestDTO{

    public string $tokenId;
    public string $userEmail;
    public string $userName;
    public string $googleId;

    public function __construct(string $tokenId, string $userEmail, string $userName, string $googleId){
        $this->tokenId = $tokenId;
        $this->userEmail = $userEmail;
        $this->userName = $userName;
        $this->googleId = $googleId;
    }

    public function toArray(): array{
        return [
            'tokenId' => $this->tokenId,
            'userEmail' => $this->userEmail,
            'userName' => $this->userName,
            'googleId' => $this->googleId,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['tokenId'],
            $data['userEmail'],
            $data['userName'],
            $data['googleId']
        );
    }
}