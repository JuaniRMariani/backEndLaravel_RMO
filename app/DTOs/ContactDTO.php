<?php

namespace App\DTOs;

class ContactDTO{
    
    public string $name;
    public string $lastName;
    public string $email;
    public string $message;

    public function __construct(string $name, string $lastName, string $email, string $message){
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->message = $message;
    }

    public static function fromArray(array $data): self{
        return new self(
            $data['name'] ?? '',
            $data['lastName'] ?? '',
            $data['email'] ?? '',
            $data['message'] ?? ''
        );
    }

    public function toArray(): array{
        return [
            'name' => $this->name,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'message' => $this->message,
        ];
    }
}