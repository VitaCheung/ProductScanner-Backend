<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Dislike;

class DislikesController extends Controller
{

    public function list()
    {
        return view('dislikes.list', [
            'dislikes' => Dislike::all()
        ]);
    }

    public function addForm()
    {

        return view('dislikes.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'UPC' => 'required',
        ]);

        $dislike = new Dislike();
        $dislike->UPC = $attributes['UPC'];
        $dislike->save();
        $dislike->dislikeUsers()->attach(Auth::user()->id);

        return redirect('/console/dislikes/list')
            ->with('message', 'dislike has been added!');
    }

    // public function editForm(Dislike $dislike)
    // {
    //     return view('dislikes.edit', [
    //         'dislike' => $dislike,
    //     ]);
    // }

    // public function edit(Dislike $dislike)
    // {

    //     $attributes = request()->validate([
    //         'title' => 'required',
    //     ]);

    //     $dislike->title = $attributes['title'];
    //     $dislike->save();

    //     return redirect('/console/dislikes/list')
    //         ->with('message', 'dislike has been edited!');
    // }

    public function delete(Dislike $dislike)
    {
        $dislike->delete();
        
        return redirect('/console/dislikes/list')
            ->with('message', 'dislike has been deleted!');        
    }

}
