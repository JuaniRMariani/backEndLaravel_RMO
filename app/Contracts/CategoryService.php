<?php

namespace App\Contracts;

use App\DTOs\CategoryDTO;

interface CategoryService{

    public function createCategory(array $category): ?CategoryDTO;

    public function getCategoryById(string $categoryId): ?CategoryDTO;

    public function getAllCategories(): array;

    public function updateCategory(string $categoryId, array $category): ?CategoryDTO;

    public function deleteCategory(string $categoryId): void;

    public function addImageToCategory(string $categoryId, string $imagePath): ?string;

    public function removeImageFromCategory(string $categoryId, string $imagePath): void;

    public function getRandomImageFromCategory(string $categoryId): ?string;
    
    public function getAllImagesFromCategory(string $categoryId): array;
    
}