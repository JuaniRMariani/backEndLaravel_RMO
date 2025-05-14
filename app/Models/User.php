<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use \Illuminate\Support\Str;

class User extends Model{
    
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'email',
        'googleId',
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

    public function posts(): HasMany{
        return $this->hasMany(JobOffer::class, 'user_id');
    }
}
