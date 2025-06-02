<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Illuminate\Support\Str;

class Favorite extends Model{
    
    protected $table = 'favorite';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'job_offer_id',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(): BelongsTo{
        return $this->belongsTo(JobOffer::class, 'job_offer_id');
    }
}