<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ColorModel extends Model
{
    use HasFactory;

    protected $table = 'colors';
    protected $fillable = ['value'];

    public function models(): HasMany
    {
        return $this->hasMany(ModelsModel::class);
    }
}
