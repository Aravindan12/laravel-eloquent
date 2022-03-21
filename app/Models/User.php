<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Log;
use Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the user's image.
     * connecting the child table with class and the common column
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * full name attributes
     */
    public function getFullNameAttribute()
    {
      return strtolower($this->name);
    }

    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    /**
     * Write code on Method
     *
     * @return response()
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
  
            $item->slug = Str::slug($item->name);
        });
  
        /** 
         * Write code on Method
         *
         * @return response()
         */
        static::created(function($item) {           
            /*
                Write Logic Here
            */ 
  
            Log::info('Created event call: '.$item);
            $item->slug =$item->name."-".$item->id;
            // dd($item->slug);
        });
  
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updating(function($item) {            
            Log::info('Updating event call: '.$item); 
  
            $item->slug = Str::slug($item->name);
        });
  
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::updated(function($item) {  
            /*
                Write Logic Here
            */    
  
            Log::info('Updated event call: '.$item);
        });
  
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::deleted(function($item) {   
            User::create(['name'=>"trails"]);       
            Log::info('Deleted event call: '.$item); 
        });
    }
}
