<?php

namespace Modules\Comments\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Posts\Entities\Post;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
        'date',
    ];


    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    protected static function newFactory()
    {
        return \Modules\Comments\Database\factories\CommentFactory::new();
    }
}
