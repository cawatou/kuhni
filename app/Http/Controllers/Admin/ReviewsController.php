<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Item;

class ReviewsController extends BackController
{
    public function index($itemid)
    {
        return view('admin.reviews.index')->with([
            'items' => Review::where(['item_id' => $itemid])->get(),
            'itemfor' => Item::find($itemid),
        ]);
    }
    
    public function add($itemid, Request $request)
    {
        if ($request->isMethod('post'))
        {
            $item = new Review;
            $item->name = $request->input('name');
            $item->item_id = $itemid;
            $item->content = $request->input('content');
            $item->save();
            
            return redirect('/administrator/reviews/'.$itemid.'/edit/'.$item->id);
        }
        
        return view('admin.reviews.add')->with([
            
        ]);
    }
    
    public function edit($itemid, $id, Request $request)
    {
        $item = Review::find($id);
        if ($request->isMethod('post'))
        {
            $item->name = $request->input('name');
            $item->name = $request->input('name');
            $item->item_id = $itemid;
            $item->content = $request->input('content');
            $item->save();
            
            return redirect('/administrator/reviews/'.$itemid.'/edit/'.$item->id);
        }
        
        return view('admin.reviews.edit')->with([
            'item' => $item
        ]);
    }

    public function delete($itemid, $id, Request $request)
    {
        $item = Review::find($id);
        $item->delete();

        return redirect('/administrator/reviews/'.$itemid);
    }

    
}