<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\SavedItem;
use App\Models\User;

class SavedItemsController extends Controller
{

    public function list()
    {
        return view('saveditems.list', [
            'saveditems' => SavedItem::all()
        ]);
    }

    public function addForm()
    {

        return view('saveditems.add', [
            'users' => User::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'UPC' => 'required',
            'name' => 'required',
            'brand' => 'required',
            'img' => 'nullable|url',
        ]);

        $saveditem = new SavedItem();
        $saveditem->UPC = $attributes['UPC'];
        $saveditem->name = $attributes['name'];
        $saveditem->brand = $attributes['brand'];
        $saveditem->img = $attributes['img'];
        $saveditem->user_id = Auth::user()->id;
        $saveditem->save();

        return redirect('/console/saveditems/list')
            ->with('message', 'saveditem has been added!');
    }

    // public function editForm(SavedItem $saveditem)
    // {
    //     return view('saveditems.edit', [
    //         'saveditem' => $saveditem,
    //     ]);
    // }

    // public function edit(SavedItem $saveditem)
    // {

    //     $attributes = request()->validate([
    //         'title' => 'required',
    //     ]);

    //     $saveditem->title = $attributes['title'];
    //     $saveditem->save();

    //     return redirect('/console/saveditems/list')
    //         ->with('message', 'saveditem has been edited!');
    // }

    public function delete(SavedItem $saveditem)
    {
        $saveditem->delete();
        
        return redirect('/console/saveditems/list')
            ->with('message', 'saveditem has been deleted!');        
    }

}