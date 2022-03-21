<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
        
        /**
         * Get the user that owns the Commets
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function post()
        {
            return $this->belongsTo(Post::class, 'post_id', 'id');
        }
}