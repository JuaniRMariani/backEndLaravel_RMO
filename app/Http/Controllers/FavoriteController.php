<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Contracts\FavoriteService;

use InvalidArgumentException;

class FavoriteController extends Controller{

    protected $favoriteService;

    public function __construct(FavoriteService $favoriteService){
        $this->favoriteService = $favoriteService;
    }

    public function addToFavorites(Request $request, string $jobOfferId){
        $userId = $request->input('user_id');
        if($userId == null || $jobOfferId == null){
            throw new InvalidArgumentException("User ID and Job Offer ID cannot be null");
        }

        return response()->json($this->favoriteService->addToFavorites($userId, $jobOfferId));
    }

    public function removeFromFavorites(Request $request, string $jobOfferId){
        $userId = $request->input('user_id');
        if($userId == null || $jobOfferId == null){
            throw new InvalidArgumentException("User ID and Job Offer ID cannot be null");
        }
        return response()->json($this->favoriteService->removeFromFavorites($userId, $jobOfferId));
    }

    public function getUserFavorites(Request $request){
        $userId = $request->input('user_id');
        if($userId == null){
            throw new InvalidArgumentException("User ID cannot be null");
        }
        return response()->json($this->favoriteService->getUserFavorites($userId));
    }

    public function isFavorite(Request $request, string $jobOfferId){
        $userId = $request->input('user_id');
        if($userId == null || $jobOfferId == null){
            throw new InvalidArgumentException("User ID and Job Offer ID cannot be null");
        }
        return response()->json($this->favoriteService->isFavorite($userId, $jobOfferId));
    }

    
}
