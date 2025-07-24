<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'name',
        'price',
        'rating',
        'image'
    ];

    // Relationship with Cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // Get badge information for the product
    public function getBadgeAttribute()
    {
        $badges = [
            'fruits' => ['text' => 'FRESH', 'color' => 'bg-green-600'],
            'veg' => ['text' => 'ORGANIC', 'color' => 'bg-green-600'],
            'meats' => ['text' => 'PREMIUM', 'color' => 'bg-red-600'],
            'dairy' => ['text' => 'FARM FRESH', 'color' => 'bg-yellow-600'],
            'sea-food' => ['text' => 'IMPORTED', 'color' => 'bg-blue-600'],
            'fish' => ['text' => 'FRESH', 'color' => 'bg-blue-600']
        ];

        return $badges[$this->category] ?? ['text' => 'QUALITY', 'color' => 'bg-purple-600'];
    }

    // Get formatted price unit
    public function getPriceUnitAttribute()
    {
        if ($this->category == 'dairy' && str_contains(strtolower($this->name), 'egg')) {
            return '/= 12 pieces';
        } elseif ($this->price <= 100) {
            return '/= ' . ($this->price <= 50 ? '1 kg' : '500 gm');
        } else {
            return '/= 1 kg';
        }
    }

    // Get star rating display
    public function getStarRatingAttribute()
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            $stars .= ($i <= $this->rating) ? '★' : '☆';
        }
        return $stars;
    }

    // Scope for featured products
    public function scopeFeatured($query, $limit = 8)
    {
        return $query->take($limit);
    }

    // Scope for products by category
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
