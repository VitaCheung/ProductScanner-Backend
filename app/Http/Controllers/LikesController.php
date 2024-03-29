<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Validation\Rule;
use App\Models\Like;
use App\Models\User;
use App\Models\LikeUser;

class LikesController extends Controller
{

    public function list()
    {
        return view('likes.list', [
            'likes' => Like::all()
        ]);
    }

    public function addForm()
    {

        return view('likes.add', [
            'users' => User::all()
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'code' => 'required',
        ]);

        $like = new Like();
        $like->code = $attributes['code'];
        // $like->likeUsers()->attach($attributes['id']);
        // $like->likeUsers()->attach($attributes['like_id']);
        $like->save();
        $like->likeUsers()->attach(Auth::user()->id);
            


        return redirect('/console/likes/list')
            ->with('message', 'like has been added!');
    }

    // public function editForm(Like $like)
    // {
    //     return view('likes.edit', [
    //         'like' => $like,
    //     ]);
    // }

    // public function edit(Like $like)
    // {

    //     $attributes = request()->validate([
    //         'title' => 'required',
    //     ]);

    //     $like->title = $attributes['title'];
    //     $like->save();

    //     return redirect('/console/likes/list')
    //         ->with('message', 'like has been edited!');
    // }

    public function delete(Like $like)
    {
        $like->delete();
        
        return redirect('/console/likes/list')
            ->with('message', 'like has been deleted!');        
    }

}
