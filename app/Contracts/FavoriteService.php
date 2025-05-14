<?php

namespace App\Contracts;

use App\DTOs\FavoriteDTO;

interface FavoriteService{
    public function addToFavorites(string $userEmail, string $jobOfferId): ?FavoriteDTO;

    public function removeFromFavorites(string $userEmail, string $jobOfferId): void;

    public function getUserFavorites(string $userEmail): array;

    public function isFavorite(string $userEmail, string $jobOfferId): bool;
}
