<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function booted(){
        static::creating(function (Tool $tool){
            $tool->slug = Str::slug($tool->name, '-');
        });
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id');
    }
}
