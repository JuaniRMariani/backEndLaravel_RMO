<?php

namespace App\DTOs;

use App\Models\Category;

class CategoryDTO{

    public string $id;
    public string $name;
    public array $images;

    public function __construct(string $id, string $name, array $images)
    {
        $this->id = $id;
        $this->name = $name;
        $this->images = $images;
    }

    public static function fromModel(Category $category): self
    {
        return new self(
            id: $category->id,
            name: $category->name,
            images: $category->images
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'images' => $this->images,
        ];
    }
}