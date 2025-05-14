<?php

namespace App\Services;

use App\Contracts\CategoryService;
use App\DTOs\CategoryDTO;

class CategoryServiceImpl implements CategoryService {
    public function createCategory(array $category): ?CategoryDTO
    {
        // Implementation for creating a category
        return null;
    }

    public function getCategoryById(string $categoryId): ?CategoryDTO
    {
        // Implementation for getting a category by ID
        return null;
    }

    public function getAllCategories(): array
    {
        // Implementation for getting all categories
        return [];
    }

    public function updateCategory(string $categoryId, array $category): ?CategoryDTO
    {
        // Implementation for updating a category
        return null;
    }

    public function deleteCategory(string $categoryId): void
    {
        // Implementation for deleting a category
    }

    public function addImageToCategory(string $categoryId, string $imagePath): ?string
    {
        // Implementation for adding an image to a category
        return null;
    }

    public function removeImageFromCategory(string $categoryId, string $imageId): void
    {
        // Implementation for removing an image from a category
    }

    public function getRandomImageFromCategory(string $categoryId): ?string
    {
        // Implementation for getting a random image from a category
        return null;
    }

    public function getAllImagesFromCategory(string $categoryId): array
    {
        // Implementation for getting all images from a category
        return [];
    }
}