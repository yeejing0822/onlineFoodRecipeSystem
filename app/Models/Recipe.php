<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rating;
use App\Models\Comment;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'ingredients', 'steps', 'image'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}

