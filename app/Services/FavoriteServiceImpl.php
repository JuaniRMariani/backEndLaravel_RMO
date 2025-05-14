<?php

namespace App\Services;

use App\Contracts\FavoriteService;
use App\DTOs\FavoriteDTO;

class FavoriteServiceImpl implements FavoriteService{
    public function addToFavorites(string $userId, string $jobOfferId): ?FavoriteDTO
    {
        // Implementation for adding a job offer to favorites
        return null;
    }

    public function removeFromFavorites(string $userId, string $jobOfferId): void
    {
        // Implementation for removing a job offer from favorites
    }

    public function getUserFavorites(string $userId): array
    {
        // Implementation for getting all favorite job offers for a user
        return [];
    }

    public function isFavorite(string $userId, string $jobOfferId): bool
    {
        // Implementation for checking if a job offer is a favorite for a user
        return false;
    }
}