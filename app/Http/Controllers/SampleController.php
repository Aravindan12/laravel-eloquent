<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Events\UserEvent;
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
    
    /**
     * Get a particular user
     * To show the accessors working
     * Also include the event to send a mail to the admin by listeners
     */
    public function gettingLowerCaseValue(){
        $user = User::find(13);
        event(new UserEvent($user));
        return view('show_details',compact('user'));
    }

    /**
     * Add a new user in user table
     * To show the Mutators working
     */
    public function addingUpperCaseValue(){
        $user = new User;
        $user->name = "laravel";
        $user->save();
        return view('show_details',compact('user'));
    }

    /**
     * Get post records having status 1
     * To show the query scope performance which is added in Post model
     */
    public function getScopeRecords(){
        $post = Post::select("*")->status(1)->get();
        dd($post);
    }

    /**
     * Add a new user
     *  Example for model events while creating
     */
    public function addUsers(){
        User::create(['name'=>'muthu']);
        dd('added');
    }

    /**
     * Delete a user from user table
     * Example for model events while deleting
     */
    public function deleteUser($id){
        User::find($id)->delete();
        dd('deleted');
    }

    /**
     * Get comments function using relationships
     * To show the performance of eager loading
     */
    public function getComments(){
        $comments = Comment::with('post')->get();
        foreach($comments as $comment){
            echo $comment->post->name . "<br>";
        }
    }

    /**
     * Get function for adding post
     * used observers while created
     */
    public function addPost(){
        $post = new Post();
        $post->name = "new post";
        $post->status = 1;
        $post->save();
        $name = $post->name;
        return view('show_details',compact('name'));
    }
}

