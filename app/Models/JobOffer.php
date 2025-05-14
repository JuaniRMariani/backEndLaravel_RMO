<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Support\Str;
use \App\Models\Enums\PostulationEnum;

class JobOffer extends Model{
    
    protected $table = 'post';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'companyName',
        'location',
        'publishedDate',
        'closeDate',
        'postulationType',
        'emailContact',
        'postLink',
        'category_id',
        'companyLogo',
        'slug',
        'isActive',
    ];

    protected $casts = [
        'id' => 'string',
        'publishedDate' => 'datetime',
        'closeDate' => 'datetime',
        'isActive' => 'boolean',
        'postulationType' => PostulationEnum::class,
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
            if (empty($model->publishedDate)) {
                $model->publishedDate = now();
            }
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title, '-');
            }
        });
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'category_id');
    }
}