<?php

namespace App\DTOs;

use App\Models\Favorite;

class FavoriteDTO{

    private string $id;
    private string $userId;
    private string $job_offer_id;

    public function __construct(string $id,string $userId, string $job_offer_id)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->job_offer_id = $job_offer_id;
    }

    public static function fromModel(Favorite $favorite): self
    {
        return new self(
            id: $favorite->id,
            userId: $favorite->user_id,
            job_offer_id: $favorite->job_offer_id
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'job_offer_id' => $this->job_offer_id,
        ];
    }
}