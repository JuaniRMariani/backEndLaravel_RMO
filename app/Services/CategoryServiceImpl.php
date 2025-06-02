<?php

namespace App\Services;

use App\Contracts\CategoryService;
use App\DTOs\CategoryDTO;
use App\Models\Category;

use Illuminate\Support\Facades\Validator;

use Exception;
class CategoryServiceImpl implements CategoryService {
    public function createCategory(array $category): CategoryDTO{
        $this->validateData($category);
        $newCategory = Category::create([
            'name' => $category['name'],
            'images' => $category['images'] ?? [],
        ]);

        return $this->mapToDTO($newCategory);
    }

    public function getCategoryById(string $categoryId): CategoryDTO{
        $category = Category::findOrFail($categoryId);
        return $this->mapToDTO($category);
    }

    public function getAllCategories(): array {
        return Category::all()
            ->map(function ($category) {
                return $this->mapToDTO($category);
            })
            ->all();
    }

    public function updateCategory(array $category, string $categoryId): CategoryDTO{
        $this->validateData($category, true);
        logger()->info("Validando categoria");
        $existingCategory = Category::findOrFail($categoryId);
        logger()->info("Categoria existente: " . $existingCategory);
        $existingCategory->update($category);

        return $this->mapToDTO($existingCategory);
    }

    public function deleteCategory(string $categoryId): void{
        $category = Category::findOrFail($categoryId);
        $category->delete();
    }

    public function addImageToCategory(string $categoryId, string $imagePath): string{
        $category = Category::findOrFail($categoryId);
        $category->images()->create(['path' => $imagePath]);
        return $imagePath;
    }

    public function removeImageFromCategory(string $categoryId, string $imageId): void{
        $category = Category::findOrFail($categoryId);
        $image = $category->images()->findOrFail($imageId);
        $image->delete();
    }

    public function getRandomImageFromCategory(string $categoryId): string{
        $category = Category::findOrFail($categoryId);
        $image = $category->images()->inRandomOrder()->first();
        if (!$image) {
            throw new Exception('No images found for this category');
        }
        return $image ? $image->path : '';
    }

    public function getAllImagesFromCategory(string $categoryId): array{
        $category = Category::findOrFail($categoryId);
        return $category->images()->get()->toArray();
    }

    protected function mapToDTO($category): CategoryDTO{
        return new CategoryDTO(
            $category->id,
            $category->name,
            $category->images
        );
    }

    private function validateData(array $data, $isUpdate = false): void{
        $rules = [
            'name' => $isUpdate
                ? ['sometimes', 'string', 'max:255']
                : ['required', 'string', 'max:255'],
        ];



        Validator::make($data, $rules)->validate();
    }
}