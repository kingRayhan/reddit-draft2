<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'id', 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id')->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
