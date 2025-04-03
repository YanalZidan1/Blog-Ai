<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'En_title',
        'Ar_title',
        'En_content',
        'Ar_content',
        'post_cover',
        'card_cover',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
