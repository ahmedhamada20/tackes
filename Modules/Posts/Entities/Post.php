<?php

namespace Modules\Posts\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Modules\Comments\Entities\Comment;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author_id',
        'image',
        'date',
        'content',
    ];

    protected $appends = ['photo'];

    public function getPhotoAttribute()
    {
        return $this->attributes['image'] != null ? asset('storage/posts/' . $this->attributes['image']) : null;
    }

    public function author()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }



    protected static function newFactory()
    {
        return \Modules\Posts\Database\factories\PostFactory::new();
    }
}
