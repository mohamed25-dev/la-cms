<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id', 'title', 'body', 'slug', 'approved', 'image_path'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function comments () 
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeApproved ($query) 
    {
        return $query->whereApproved(true)->latest();
    }

    public function getImagePathAttribute ($img) 
    {
        return asset('storage/images/' . $img);
    }
    
    public function setTitleAttribute ($value) 
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Slug::uniqueSlug($value, 'posts');
    }
}
