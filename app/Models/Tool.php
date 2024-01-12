<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public static function booted(){
        static::creating(function (Tool $tool){
            $tool->user_id = auth()->id();
            $tool->slug = Str::slug($tool->name, '-');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function isRentedByUser()
    {
        return $this->rentals()->where('user_id', auth()->id())->where('is_approved', true)->exists();
    }
    
    public function rentals()
    {
        return $this->hasMany(ToolsRental::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class)->where('is_approved', true);
    }

    public function averageRating()
    {
        $reviews = $this->reviews()->get();

        if ($reviews->isEmpty()) {
            return 0;
        }

        $totalRating = $reviews->sum(function ($review) {
            return ($review->performance_rating +
                    $review->customer_service_rating +
                    $review->support_rating +
                    $review->after_sales_support_rating +
                    ($review->miscellaneous_rating ?? 0));
        });

        $average = $totalRating / ($reviews->count() * 5); // Assuming ratings are out of 5 for each category
        return round($average, 1);
    }

    // public function averageRating()
    // {
    //     $ratings = $this->ratings()->pluck('rating')->toArray();
    //     if (count($ratings) === 0) {
    //         return 0;
    //     }
    //     $average = array_sum($ratings) / count($ratings);
    //     return round($average, 1);
    // }
}
