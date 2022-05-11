<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Log;
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    /**
     * Get the post's image.
     * connecting the child table with class and the common column

     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopestatus($query,$type)
    {
        return $query->where('status',$type);
    }

    /**
     * Added the model events while creating a record
     */
    public static function boot() {
  
        parent::boot();
  
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::creating(function($item) {            
            Log::info('Creating event call: '.$item); 
  
            $item->status = 1;
        });
    }
}
