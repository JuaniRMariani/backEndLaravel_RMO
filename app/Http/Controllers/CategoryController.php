<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\DTOs\CategoryDTO;

use App\Contracts\CategoryService;
use Illuminate\Http\Request;
use InvalidArgumentException;

class CategoryController extends Controller{

    protected $categoryService;

    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }

     public function index(){
        return response()->json($this->categoryService->getAllCategories());
    }

    public function store(Request $request){
        $data = $request->all();
        return response()->json($this->categoryService->createCategory($data));
    }

    public function show(string $categoryId){
        return response()->json($this->categoryService->getCategoryById($categoryId));
    }

    public function update(Request $request, string $category){
        logger()->info("Updating category with ID: " . $category);
        $data = $request->all();
        return response()->json($this->categoryService->updateCategory($data, $category));
    }

    public function destroy(string $categoryId){
        $this->categoryService->deleteCategory($categoryId);
        return response()->json(null, 204);
    }

    public function getCategoryById(string $categoryId): ?CategoryDTO{
        if($categoryId == null){
            throw new InvalidArgumentException("Category ID cannot be null");
        }
        return $this->categoryService->getCategoryById($categoryId);
    }

    public function addImageToCategory(string $categoryId, string $imagePath): ?string{
        if($categoryId == null){
            throw new InvalidArgumentException("Category ID cannot be null");
        }else if($imagePath == null){
            throw new InvalidArgumentException("Image path cannot be null");
        }
        return $this->categoryService->addImageToCategory($categoryId, $imagePath);
    }

    public function removeImageFromCategory(string $categoryId, string $imageId): void{
        if($categoryId == null){
            throw new InvalidArgumentException("Category ID cannot be null");
        }else if($imageId == null){
            throw new InvalidArgumentException("Image ID cannot be null");
        }
        $this->categoryService->removeImageFromCategory($categoryId, $imageId);
    }

    public function getRandomImageFromCategory(string $categoryId): ?string{
        if($categoryId == null){
            throw new InvalidArgumentException("Category ID cannot be null");
        }
        return $this->categoryService->getRandomImageFromCategory($categoryId);
    }

    public function getAllImagesFromCategory(string $categoryId): array{
        if($categoryId == null){
            throw new InvalidArgumentException("Category ID cannot be null");
        }
        return $this->categoryService->getAllImagesFromCategory($categoryId);
    }      

}

