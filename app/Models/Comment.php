<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = ['property_id', 'user_id', 'body', 'parent_id', 'rating'];

        // In Comment.php Model
    public static function saveComment($data)
    {
        $comment = self::create($data);

        // Load relationships if necessary
        $comment->load('user', 'property');

        return $comment;
    }


    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
