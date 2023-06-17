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
    public function index()
    {
    $userId = auth()->id();

    $savedItems = SavedItem::where('user_id', $userId)->orderBy('created_at')->get();

    return response()->json($savedItems);
    }

    public function additem()
    {
        $attributes = request()->validate([
            'UPC' => 'required',
            'name' => 'required',
            'asin' => 'nullable|string',
            'img' => 'nullable|url',
        ]);

        $saveditem = new SavedItem;
        $saveditem->UPC = $attributes['UPC'];
        $saveditem->name = $attributes['name'];
        $saveditem->asin = $attributes['asin'];
        $saveditem->img = $attributes['img'];
        $saveditem->user_id = auth()->id();
        $saveditem->save();

    
        return response()->json([
            'message' => 'Item has been added!',
            'saveditem' => $saveditem
        ], 200);
    }

    public function deleteitem(SavedItem $saveditem)
    {
        $saveditem->delete();

        return response()->json([
            'message' => 'Item has been deleted!'
        ], 200);
        
              
    }
    public function deleteItemByAsin($asin)
    {
        // Find the item by 'asin' and delete it
        $item = SavedItem::where('asin', $asin)->first();
        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Item deleted successfully']);
        } else {
            return response()->json(['message' => 'Item not found'], 404);
        }
    }



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
            'asin' => 'required',
            'img' => 'nullable|url',
        ]);

        $saveditem = new SavedItem();
        $saveditem->UPC = $attributes['UPC'];
        $saveditem->name = $attributes['name'];
        $saveditem->asin = $attributes['asin'];
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
