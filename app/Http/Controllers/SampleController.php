<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;

class SampleController extends Controller
{
    //
    public function getImage(){
        $post = Post::find(1);
 
        $image = new Image;
        $image->url = "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg";
        $post->image()->save($image);
        dd($post->image);
    }
}
