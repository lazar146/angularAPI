<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RamModel extends Model
{
    use HasFactory;
    protected $table = 'ram_specs';
    protected $fillable = [
        'name',
    ];

    public function models(): HasMany
    {
        return $this->hasMany(ModelsModel::class);
    }
}
