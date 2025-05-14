<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Str;

class Category extends Model{
    
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'images',
    ];

    protected $casts = [
        'id' => 'string',
        'images' => 'array',
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

}