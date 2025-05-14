<?php

namespace App\DTOs;

use App\Models\JobOffer;

class JobOfferDTO{

    public string $id;
    public string $title;
    public string $description;
    public UserDTO $user;
    public string $location;
    public string $companyName;
    public string $publishedDate;
    public ?string $expiresDate;
    public string $postulationType;
    public ?string $emailContact;
    public ?string $postLink;
    public CategoryDTO $category;
    public string $companyLogo;
    public string $slug;
    public bool $isActive;

    public function __construct(
        string $id,
        string $title,
        string $description,
        UserDTO $user,
        string $location,
        string $companyName,
        string $publishedDate,
        ?string $expiresDate,
        string $postulationType,
        ?string $emailContact,
        ?string $postLink,
        CategoryDTO $category,
        string $companyLogo,
        string $slug,
        bool $isActive
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->user = $user;
        $this->location = $location;
        $this->companyName = $companyName;
        $this->publishedDate = $publishedDate;
        $this->expiresDate = $expiresDate;
        $this->postulationType = $postulationType;
        $this->emailContact = $emailContact;
        $this->postLink = $postLink;
        $this->category = $category;
        $this->companyLogo = $companyLogo;
        $this->slug = $slug;
        $this->isActive = $isActive;
    }

    public static function fromModel(JobOffer $jobOffer): self
    {
        return new self(
            id: $jobOffer->id,
            title: $jobOffer->title,
            description: $jobOffer->description,
            user: UserDTO::fromModel($jobOffer->user),
            location: $jobOffer->location,
            companyName: $jobOffer->companyName,
            publishedDate: $jobOffer->publishedDate,
            expiresDate: $jobOffer->expiresDate,
            postulationType: $jobOffer->postulationType,
            emailContact: $jobOffer->emailContact,
            postLink: $jobOffer->postLink,
            category: CategoryDTO::fromModel($jobOffer->category),
            companyLogo: $jobOffer->companyLogo,
            slug: $jobOffer->slug,
            isActive: $jobOffer->isActive
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'user' => $this->user->toArray(),
            'location' => $this->location,
            'companyName' => $this->companyName,
            'publishedDate' => $this->publishedDate,
            'closeDate' => $this->expiresDate,
            'postulationType' => $this->postulationType,
            'emailContact' => $this->emailContact,
            'postLink' => $this->postLink,
            'category' => $this->category->toArray(),
            'companyLogo' => $this->companyLogo,
            'slug' => $this->slug,
            'isActive' => $this->isActive,
        ];
    }

}