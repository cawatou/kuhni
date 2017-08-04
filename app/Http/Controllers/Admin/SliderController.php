<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Illuminate\Http\Request;
use App\Models\SliderItem;
use App\Models\Item;

class SliderController extends BackController
{
    public function index($itemid)
    {
        return view('admin.slider.index')->with([
            'items' => SliderItem::where(['item_id' => $itemid])->get(),
            'itemfor' => Item::find($itemid),
        ]);
    }
    
    public function add($itemid, Request $request)
    {
        if ($request->isMethod('post'))
        {
            $item = new SliderItem;
            $item->name = $request->input('name');
            $item->item_id = $itemid;
            $item->description = $request->input('description');
            $item->pos = 0;
            $item->save();
            
            $file = $request->file('image');
            if($file)
            {
                
                $fileName = md5(microtime());
                $ext = $request->file('image')->getClientOriginalExtension();
                
                $request->file('image')->move(base_path() . '/public/files/slides/', $fileName.'.'.$ext);
                
                $item->image = $fileName.'.'.$ext;
                
                $item->save();
            }
            
            return redirect('/administrator/slider/'.$itemid.'/edit/'.$item->id);
        }
        
        return view('admin.slider.add')->with([
            
        ]);
    }
    
    public function edit($itemid, $id, Request $request)
    {
        $item = SliderItem::find($id);
        if ($request->isMethod('post'))
        {
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            $item->pos = 0;
            $item->save();
            
            
            $file = $request->file('image');
            if($file)
            {
                if(is_file(base_path() . '/public/files/slides/'.$item->image))
                {
                    unlink(base_path() . '/public/files/slides/'.$item->image);
                }
                
                $fileName = md5(microtime());
                $ext = $request->file('image')->getClientOriginalExtension();
                
                $request->file('image')->move(base_path() . '/public/files/slides/', $fileName.'.'.$ext);
                
                $item->image = $fileName.'.'.$ext;
                
                $item->save();
            }
            
            return redirect('/administrator/slider/'.$itemid.'/edit/'.$item->id);
        }
        
        return view('admin.slider.edit')->with([
            'item' => $item
        ]);
    }
    
    public function delete($itemid, $id)
    {
        $slide = SliderItem::find($id);
        if(is_file(base_path() . '/public/files/slides/'.$slide->image))
        {
            unlink(base_path() . '/public/files/slides/'.$slide->image);
        }
        $slide->delete();
        
        return redirect()->back();
    }
}