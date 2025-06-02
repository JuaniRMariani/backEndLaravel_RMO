<?php

namespace App\Services;

use App\Models\User;
use App\Models\JobOffer;
use App\Models\Favorite;

use App\Contracts\FavoriteService;
use App\DTOs\FavoriteDTO;

class FavoriteServiceImpl implements FavoriteService{
    public function addToFavorites(string $userId, string $jobOfferId): FavoriteDTO{
        
        User::findOrFail($userId);
        JobOffer::findOrFail($jobOfferId);

        $favorite = Favorite::create([
            'user_id' => $userId,
            'job_offer_id' => $jobOfferId,
        ]);

        return $this->mapToDTO($favorite);
    }

    public function removeFromFavorites(string $userId, string $jobOfferId): void{

        $favorite = Favorite::where('user_id', $userId)
            ->where('job_offer_id', $jobOfferId)
            ->firstOrFail();

        $favorite->delete();
    }

    public function getUserFavorites(string $userId): array{
        return Favorite::where('user_id', $userId)
            ->with('jobOffer')
            ->get();
    }

    public function isFavorite(string $userId, string $jobOfferId): bool{
        return Favorite::where('user_id', $userId)
            ->where('job_offer_id', $jobOfferId)
            ->exists();
    }

    private function mapToDTO($favorite): FavoriteDTO{
        return new FavoriteDTO(
            $favorite->id,
            $favorite->user_id,
            $favorite->job_offer_id
        );
    }

}