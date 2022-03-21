<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;

class SampleController extends Controller
{
    /*
    * this function will show how to insert and return data in polymorphic relationship
    */
    public function getImage(){
        $post = Post::find(1);
 
        $image = new Image;
        $image->url = "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg";
        $post->image()->save($image);
        dd($post->image);
    }

    public function gettingLowerCaseValue(){
        $user = User::find(1);
        return view('show_details',compact('user'));
    }

    
    public function addingUpperCaseValue(){
        $user = new User;
        $user->name = "raguvaran";
        $user->save();
        return view('show_details',compact('user'));
    }


    public function getScopeRecords(){
        $post = Post::select("*")->status(1)->get();
        dd($post);
    }

    public function addUsers(){
        User::create(['name'=>'muthu']);
        dd('added');
    }

    public function deleteUser($id){
        User::find($id)->delete();
        dd('deleted');
    }

    public function getComments(){
        $comments = Comment::with('post')->get();
        foreach($comments as $comment){
        // dd($comment->post);
            echo $comment->post->name . "<br>";
        }
    }
}

