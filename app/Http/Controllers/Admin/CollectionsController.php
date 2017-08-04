<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\CollectionImage;
use App\Models\Item;
use App\Models\Callback;
use App\Models\Counter;
use App\Models\ItemDesigner;
use App\Models\MenuItem;
use App\Models\Recipient;
use App\Models\Review;
use App\Models\SliderItem;

class CollectionsController extends BackController
{
    public function index($ctype, $itemid)
    {
        $itemfor = Item::find($itemid);
        
        if($itemfor->type == 0 && $ctype == 1)
        {
            $items = Collection::selectRaw('collections.*')
                ->where(['items.parent' => $itemid, 'collections.ctype' => $ctype])
                ->leftJoin('items', 'items.id', '=', 'collections.item_id')
                ->get();
        
            $is_in_designer = false;
        }
        else
        {
            $items = Collection::where(['item_id' => $itemid, 'ctype' => $ctype])->get();
            $is_in_designer = true;
        }
        if($ctype != 1)
        {
            $is_in_designer = false;
        }
        
        return view('admin.collections.index')->with([
            'items' => $items,
            'itemfor' => $itemfor,
            'ctype' => $ctype,
            'is_in_designer' => $is_in_designer
        ]);
    }
    
    public function add($ctype, $itemid, Request $request)
    {
        if ($request->isMethod('post'))
        {
            $item = new Collection;
            $item->name = $request->input('name');
            $item->item_id = $itemid;
            $item->ctype = $ctype;
            $item->publish_date = $request->input('publish_date');
            $item->description = $request->input('description');
            $item->pos = 0;
            $item->save();
            
            $imageid = $request->input('imageid');
            
            if($imageid)
            {
                $i = 0;
                foreach($imageid as $k => $v)
                {
                    $file = $request->file('image.'.$k);
                    if($file)
                    {
                        $image = new CollectionImage;
                        $image->collection_id = $item->id;
                        $image->is_default = ($i == 0) ? 1 : 0;
                        $image->pos = $i;
                        
                        $fileName = md5(microtime());
                        $ext = $request->file('image.'.$k)->getClientOriginalExtension();
                        
                        $request->file('image.'.$k)->move(base_path() . '/public/files/collections/', $fileName.'.'.$ext);
                        
                        $image->value = $fileName.'.'.$ext;
                        
                        $image->save();
                        
                        $i++;
                    }
                }
            }
            
            return redirect('/administrator/collections/'.$ctype.'/'.$itemid.'/edit/'.$item->id);
        }
        
        return view('admin.collections.add')->with([
        
        ]);
    }
    
    public function edit($ctype, $itemid, $id, Request $request)
    {
        $item = Collection::find($id);
        if ($request->isMethod('post'))
        {
            $item->name = $request->input('name');
            $item->publish_date = $request->input('publish_date');
            $item->description = $request->input('description');
            $item->pos = 0;
            $item->save();
            
            $imageid = $request->input('imageid');
            
            if($imageid)
            {
                $i = 0;
                $not_del = [];
                foreach($imageid as $k => $v)
                {
                    $image = CollectionImage::find($v);
                    if(!$image)
                    {
                        $file = $request->file('image.'.$k);
                        if($file)
                        {
                            $image = new CollectionImage;
                            $image->collection_id = $item->id;
                            $image->is_default = ($i == 0) ? 1 : 0;
                            $image->pos = $i;
                            
                            $fileName = md5(microtime());
                            $ext = $request->file('image.'.$k)->getClientOriginalExtension();
                            
                            $request->file('image.'.$k)->move(base_path() . '/public/files/collections/', $fileName.'.'.$ext);
                            
                            $image->value = $fileName.'.'.$ext;
                            
                            $image->save();
                            
                            $not_del[] = $image->id;
                            
                            $i++;
                        }
                    }
                    else
                    {
                        $file = $request->file('image.'.$k);
                        if($file)
                        {
                            if(is_file(base_path() . '/public/files/collections/'.$image->value))
                            {
                                unlink(base_path() . '/public/files/collections/'.$image->value);
                            }
                            
                            $fileName = md5(microtime());
                            $ext = $request->file('image.'.$k)->getClientOriginalExtension();
                            
                            $request->file('image.'.$k)->move(base_path() . '/public/files/collections/', $fileName.'.'.$ext);
                            
                            $image->value = $fileName.'.'.$ext;
                        }
                            
                        $image->is_default = ($i == 0) ? 1 : 0;
                        $image->pos = $i;
                        
                        $image->save();
                        
                        $i++;
                            
                        $not_del[] = $image->id;
                    }
                }
                
                if(count($not_del) > 0)
                {
                    $del_img = CollectionImage::where('collection_id', $item->id)->whereNotIn('id', $not_del)->lists('value');
                
                    foreach($del_img as $di)
                    {
                        if(is_file(base_path() . '/public/files/collections/'.$di))
                        {
                            unlink(base_path() . '/public/files/collections/'.$di);
                        }
                    }
                    CollectionImage::where('collection_id', $item->id)->whereNotIn('id', $not_del)->delete();
                }
            }
            else
            {
                $del_img = CollectionImage::where('collection_id', $item->id)->lists('value');
                foreach($del_img as $di)
                {
                    if(is_file(base_path() . '/public/files/collections/'.$di))
                    {
                        unlink(base_path() . '/public/files/collections/'.$di);
                    }
                }
                CollectionImage::where('collection_id', $item->id)->delete();
            }
            
            return redirect('/administrator/collections/'.$ctype.'/'.$itemid.'/edit/'.$item->id);
        }
        
        return view('admin.collections.edit')->with([
            'item' => $item,
            'images' => CollectionImage::where('collection_id', $id)->orderBy('pos', 'ASC')->get(),
        ]);
    }


    public function delete($type, $id)
    {
        Collection::where('id', $id)->delete();

        return redirect()->back();
    }
    
    public function publish($ctype, $itemid, $id, Request $request)
    {
        $item = Collection::find($id);
        if($item)
        {
            $item->published = ($item->published == 0) ? 1 : 0;
            $item->save();
        }
        return redirect('/administrator/collections/'.$ctype.'/'.$itemid);
    }
    
}