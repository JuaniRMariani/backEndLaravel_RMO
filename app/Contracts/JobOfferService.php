<?php

namespace App\Contracts;

use App\DTOs\JobOfferDTO;

interface JobOfferService{

    public function createJobOffer(array $data): ?JobOfferDTO;

    public function getAllJobOffers(): array;

    public function getJobOfferById(string $id): ?JobOfferDTO;

    public function getJobOfferBySlug(string $slug): ?JobOfferDTO;

    public function updateJobOffer(string $id, array $data): ?JobOfferDTO;

    public function deleteJobOffer(string $id): void;

    public function getUserJobOffers(string $userEmail): array;
    
}
