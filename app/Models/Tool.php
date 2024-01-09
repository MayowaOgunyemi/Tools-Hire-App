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

    public function averageRating()
    {
        $ratings = $this->ratings()->pluck('rating')->toArray();
        if (count($ratings) === 0) {
            return 0;
        }
        $average = array_sum($ratings) / count($ratings);
        return round($average, 1);
    }
}
