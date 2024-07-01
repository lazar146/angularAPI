<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ModelsModel extends Model
{
    use HasFactory;
    protected $table = 'models';
    protected $fillable = [
        'name','description','brand_id','ram_id','color_id'
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(BrandModel::class);
    }

    public function price(): BelongsTo
    {
        return $this->belongsTo(PriceModel::class);
    }

    public function ram(): BelongsTo
    {
        return $this->belongsTo(RamModel::class);
    }

    public function images() : hasMany
    {
        return $this->hasMany(ImageModel::class);
    }
}
