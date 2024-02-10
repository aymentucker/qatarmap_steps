<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDoc extends Model
{
    use HasFactory;
    
    protected $table = 'file_docs';


    protected $fillable = ['user_id', 'url'];
    // Ensure 'user_id' and 'url' are fillable

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

