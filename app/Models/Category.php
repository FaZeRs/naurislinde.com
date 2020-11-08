<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'active',
    ];

    protected $translatable = [
        'title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
