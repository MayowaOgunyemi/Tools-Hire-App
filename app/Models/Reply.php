<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function booted(){
        static::creating(function (Reply $reply){
            $reply->user_id = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }
}
