<?php

namespace App\Services;

use App\Contracts\JobOfferService;
use App\DTOs\JobOfferDTO;
use App\Models\JobOffer;

use illuminate\Support\Facades\Validator;

use Exception;
use Illuminate\Contracts\Support\ValidatedData;

class JobOfferServiceImpl implements JobOfferService {

    public function createJobOffer(array $data): ?JobOfferDTO{

        $this->validateOfferData($data);
        $newJobOffer = $this->arrayToJobOffer($data);

        return $this->mapToDTO($newJobOffer);
    }

    public function getJobOfferById(string $id): ?JobOfferDTO{
        $jobOffer = JobOffer::findOrFail($id);
        return $this->mapToDTO($jobOffer);
    }

    public function getAllJobOffers(): array{
        $jobOffers = JobOffer::with(['category', 'user'])
            ->get();
        return array_map([$this, 'mapToDTO'], $jobOffers->toArray());
    }

    public function updateJobOffer(string $id, array $data): ?JobOfferDTO{

        $this->validateOfferData($data, true);

        $jobOffer = JobOffer::findOrFail($id);
        $jobOffer->update($data);

        return $this->mapToDTO($jobOffer);
    }

    public function deleteJobOffer(string $id): void{
        $jobOffer = JobOffer::findOrFail($id);
        $jobOffer->delete();
    }

    public function getJobOfferBySlug(string $slug): ?JobOfferDTO{
        $jobOffer = JobOffer::where('slug', $slug)->firstOrFail();
        return $this->mapToDTO($jobOffer);
    }

    public function getUserJobOffers(string $userId): array{
        $jobOffers = JobOffer::where('user_id', $userId)
            ->with('category','user')
            ->get();
        return array_map([$this, 'mapToDTO'], $jobOffers->toArray());
    }

    private function mapToDTO(JobOffer $jobOffer): JobOfferDTO{
        return new JobOfferDTO(
            $jobOffer->id,
            $jobOffer->title,
            $jobOffer->description,
            $jobOffer->user_id,
            $jobOffer->companyName,
            $jobOffer->location,
            $jobOffer->publishedDate,
            $jobOffer->closeDate,
            $jobOffer->postulationType,
            $jobOffer->emailContact,
            $jobOffer->postLink,
            $jobOffer->category_id,
            $jobOffer->companyLogo,
            $jobOffer->slug,
            $jobOffer->isActive
        );
    }

    private function validateOfferData(array $data, bool $isUpdate = false): void{
        $rules = [
            'title' => [$isUpdate ? 'sometimes' : 'required', 'string', 'max:255'],
            'description' => [$isUpdate ? 'sometimes' : 'required', 'string'],
            'user_id' => [$isUpdate ? 'sometimes' : 'required', 'uuid', 'exists:users,id'],
            'companyName' => [$isUpdate ? 'sometimes' : 'required', 'string', 'max:255'],
            'location' => [$isUpdate ? 'sometimes' : 'required', 'string', 'max:255'],
            'publishedDate' => [$isUpdate ? 'sometimes' : 'required', 'date'],
            'closeDate' => [$isUpdate ? 'sometimes' : 'required', 'date', 'after:publishedDate'],
            'postulationType' => [$isUpdate ? 'sometimes' : 'required', 'string', 'in:email,link'],
            'emailContact' => [$isUpdate ? 'sometimes' : 'required_if:postulationType,email', 'email'],
            'postLink' => [$isUpdate ? 'sometimes' : 'required_if:postulationType,link', 'url'],
            'category_id' => [$isUpdate ? 'sometimes' : 'required', 'uuid', 'exists:category,id'],
            'companyLogo' => ['nullable', 'url'],
            'slug' => [$isUpdate ? 'sometimes' : 'required', 'string', 'unique:job_offers,slug' . ($isUpdate ? ',' . $data['id'] ?? null : '')],
            'isActive' => ['boolean'],
        ];

        Validator::make($data, $rules)->validate();
    }

    private function arrayToJobOffer(array $data): JobOffer{
        return 
        JobOffer::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['user_id'],
            'companyName' => $data['companyName'],
            'location' => $data['location'],
            'publishedDate' => $data['publishedDate'],
            'closeDate' => $data['closeDate'],
            'postulationType' => $data['postulationType'],
            'emailContact' => $data['emailContact'],
            'postLink' => $data['postLink'],
            'category_id' => $data['category_id'],
            'companyLogo' => $data['companyLogo'],
            'slug' => $data['slug'],
            'isActive' => $data['isActive'] ?? false,
        ]);
    }
}