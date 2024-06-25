<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sale';

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function province(): BelongsTo 
    {
        return $this->belongsTo(Province::class, 'province_id', 'matp');
    }

    public function district(): BelongsTo 
    {
        return $this->belongsTo(District::class, 'district_id', 'maqh');
    }

    public function commune(): BelongsTo 
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'xaid');
    }
    
    public function gallery(): HasMany 
    {
        return $this->hasMany(SaleGallery::class, 'post_id', 'id');
    }
}
