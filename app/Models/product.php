<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'category',
        'description',
        'price_vnd',
        'price_display',
        'power',
        'power_ps',
        'power_kw',
        'torque_nm',
        'acceleration_sec',
        'top_speed_kmh',
        'consumption_l_per_100km',
        'spec_note',
        'length_mm',
        'height_mm',
        'main_image',
        'gallery',
        'stock',
        'is_active',
    ];

    protected $casts = [
        'gallery' => 'json',
        'is_active' => 'boolean',
    ];

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
