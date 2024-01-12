<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsRental extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function booted(){
        static::creating(function (ToolsRental $toolsRental){
            $toolsRental->user_id = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id');
    }
}
