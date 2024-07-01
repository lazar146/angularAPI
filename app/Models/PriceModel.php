<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PriceModel extends Model
{
    use HasFactory;

    protected $table = 'price';
    protected $fillable = ['model_id','price','old_price'];

    public function models(): HasMany
    {
        return $this->hasMany(ModelsModel::class);
    }

}
