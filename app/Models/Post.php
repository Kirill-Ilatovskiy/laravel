<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * @property bool $published 
     * @property Carbon $published_at 
     */
     

    protected $filleble = [
        'user_id',
        'title',
        'content',
        'published',
        'published_at',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];

    protected $dates = [
        'published_at',
    ];

    public function isPublished(): bool

    {
        return $this->published
        and $this->published_at;
    }
        
}

    