<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Collection;
use App\Models\Counter;
use App\Models\ItemDesigner;
use App\Models\Callback;
use App\Models\Recipient;
use App\Models\MenuItem;
use App\Models\Review;
use App\Models\SliderItem;
use App\Models\Statistic;

class ItemsController extends BackController
{
    public function index($type)
    {
        if($type == 'studio')
            $itype = 0;
        elseif($type == 'designers')
            $itype = 1;
        elseif($type == 'homeset')
            $itype = 2;
        
        return view('admin.items.index')->with([
            'items' => Item::where('type', $itype)->get(),
            'type' => $type]);
    }
    
    public function add($type, Request $request)
    {
        if($type == 'studio')
            $itype = 0;
        elseif($type == 'designers')
            $itype = 1;
        
        if ($request->isMethod('post'))
        {
            $item = new Item;
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->skype = $request->input('skype');
            $item->worktime = $request->input('worktime');
            $item->city = $request->input('city');
            $item->address = $request->input('address');
            $item->url = $request->input('url');
            $item->lat = $request->input('lat');
            $item->lng = $request->input('lng');
            $item->position = $request->input('position');
            $item->phones = $request->input('phones');
            $item->type = $itype;
            $item->is_active = ($request->input('is_active')) ? 1 : 0;
            $item->parent = ($request->input('parent')) ? $request->input('parent') : 0;
            $item->description = ($request->input('description')) ? $request->input('description') : '';
            $item->meta_title = $request->input('meta_title');
            $item->meta_keywords = $request->input('meta_keywords');
            $item->meta_description = $request->input('meta_description');
            $item->h1_tag = $request->input('h1_tag');
            
            $file = $request->file('main_img');
            if($file)
            {
                $fileName = md5(microtime());
                $ext = $request->file('main_img')->getClientOriginalExtension();
                
                $request->file('main_img')->move(base_path() . '/public/files/designers/', $fileName.'.'.$ext);
                
                $item->main_img = $fileName.'.'.$ext;
            }
            
            $file = $request->file('bg_img');
            if($file)
            {
                $fileName = md5(microtime());
                $ext = $request->file('bg_img')->getClientOriginalExtension();
                
                $request->file('bg_img')->move(base_path() . '/public/files/designers/', $fileName.'.'.$ext);
                
                $item->bg_img = $fileName.'.'.$ext;
            }
            
            $item->save();
            
            if(!$this->subdomain)
            {
                $counterid = $request->input('counterid');
                $countername = $request->input('countername');
                $countervalue = $request->input('countervalue');
                $countertype = $request->input('counter_type');
                if($counterid)
                {
                    $i = 0;
                    foreach($counterid as $k => $v)
                    {
                        $counter = new Counter;
                        
                        $counter->item_id = $item->id;
                        $counter->name = $countername[$k];
                        $counter->value = $countervalue[$k];
                        $counter->counter_type = $countertype[$k];
                        $counter->pos = $i;
                        $counter->save();
                        $i++;
                    }
                }
            }
            
            return redirect('/administrator/items/'.$type.'/edit/'.$item->id);
        }
        
        return view('admin.items.add')->with([
            'type' => $type,
            'studio' => Item::where('type', 0)->get(),
        ]);
    }
    
    public function edit($type, $id, Request $request)
    {
        $item = Item::find($id);
        if ($request->isMethod('post'))
        {
            $item->name = $request->input('name');
            $item->email = $request->input('email');
            $item->skype = $request->input('skype');
            $item->worktime = $request->input('worktime');
            $item->city = $request->input('city');
            $item->address = $request->input('address');
            $item->url = $request->input('url');
            $item->lat = $request->input('lat');
            $item->lng = $request->input('lng');
            $item->position = $request->input('position');
            $item->phones = $request->input('phones');
            $item->is_active = ($request->input('is_active')) ? 1 : 0;
            $item->parent = ($request->input('parent')) ? $request->input('parent') : 0;
            $item->description = ($request->input('description')) ? $request->input('description') : '';
            $item->meta_title = $request->input('meta_title');
            $item->meta_keywords = $request->input('meta_keywords');
            $item->meta_description = $request->input('meta_description');
            $item->h1_tag = $request->input('h1_tag');
            
            $file = $request->file('main_img');
            if($file)
            {
                if(is_file(base_path() . '/public/files/designers/'.$item->main_img))
                {
                    unlink(base_path() . '/public/files/designers/'.$item->main_img);
                }
                $fileName = md5(microtime());
                $ext = $request->file('main_img')->getClientOriginalExtension();
                
                $request->file('main_img')->move(base_path() . '/public/files/designers/', $fileName.'.'.$ext);
                
                $item->main_img = $fileName.'.'.$ext;
            }
            
            $file = $request->file('bg_img');
            if($file)
            {
                if(is_file(base_path() . '/public/files/designers/'.$item->bg_img))
                {
                    unlink(base_path() . '/public/files/designers/'.$item->bg_img);
                }
                $fileName = md5(microtime());
                $ext = $request->file('bg_img')->getClientOriginalExtension();
                
                $request->file('bg_img')->move(base_path() . '/public/files/designers/', $fileName.'.'.$ext);
                
                $item->bg_img = $fileName.'.'.$ext;
            }
            
            if($request->input('delete_main_img') == 1)
            {
                if(is_file(base_path() . '/public/files/designers/'.$item->main_img))
                {
                    unlink(base_path() . '/public/files/designers/'.$item->main_img);
                }
                $item->main_img = '';
            }
            
            if($request->input('delete_bg_img') == 1)
            {
                if(is_file(base_path() . '/public/files/designers/'.$item->bg_img))
                {
                    unlink(base_path() . '/public/files/designers/'.$item->bg_img);
                }
                $item->bg_img = '';
            }
            
            $item->save();
            
            
            if(!$this->subdomain)
            {
                $counterid = $request->input('counterid');
                $countername = $request->input('countername');
                $countervalue = $request->input('countervalue');
                $countertype = $request->input('counter_type');
                if($counterid)
                {
                    $i = 0;
                    $not_del = [];
                    foreach($counterid as $k => $v)
                    {
                        $counter = Counter::find($v);
                        if(!$counter)
                            $counter = new Counter;
                        
                        $counter->item_id = $item->id;
                        $counter->name = $countername[$k];
                        $counter->value = $countervalue[$k];
                        $counter->counter_type = $countertype[$k];
                        $counter->pos = $i;
                        
                        $counter->save();
                        
                        $not_del[] = $counter->id;
                        
                        $i++;
                    }
                    
                    if(count($not_del) > 0)
                    {
                        Counter::where('item_id', $item->id)->whereNotIn('id', $not_del)->delete();
                    }
                }
                else
                {
                    Counter::where('item_id', $item->id)->delete();
                }
            }
            else
            {
                $counterid = $request->input('counterid');
                $countervalue = $request->input('countervalue');
                foreach($counterid as $k => $v)
                {
                    $counter = Counter::where(['id' => $v, 'item_id' => $item->id])->first();
                    if($counter)
                    {
                        $counter->value = $countervalue[$k];
                        $counter->save();
                    }
                }
            }
            
            return redirect('/administrator/items/'.$type.'/edit/'.$item->id);
        }
        
        $count_ondoing_project = 0;
        $count_done_project = 0;
        if($type == 'studio')
        {
            $desids = Item::where('parent', $item->id)->lists('id');
            
            $count_ondoing_project = Counter::whereIn('item_id', $desids)->where('counter_type', 3)->sum('value');
            $count_done_project = Counter::whereIn('item_id', $desids)->where('counter_type', 2)->sum('value');
        }
        
        return view('admin.items.edit')->with([
            'item' => $item,
            'counters' => Counter::where('item_id', $item->id)->orderBy('pos', 'ASC')->get(),
            'studio' => Item::where('type', 0)->get(),
            'type' => $type,
            'count_ondoing_project' => $count_ondoing_project,
            'count_done_project' => $count_done_project,
            //'subdomain' => 'ffdf'
        ]);
    }
    
    public function designers($item_type, $designer_type, $item_id, Request $request)
    {
        if ($request->isMethod('post'))
        {
            $designer = $request->input('designer');
            $designerid = $request->input('designerid');
            
            
            if($designerid)
            {
                $i = 0;
                $not_del = [];
                foreach($designerid as $k => $v)
                {
                    $idesigner = ItemDesigner::find($v);
                    if(!$idesigner)
                        $idesigner = new ItemDesigner;
                    
                    $idesigner->item_id = $item_id;
                    $idesigner->designer_type = $designer_type;
                    $idesigner->designer_id = $designer[$k];
                    $idesigner->pos = $i;
                    
                    $idesigner->save();
                    
                    $not_del[] = $idesigner->id;
                    
                    $i++;
                }
                
                if(count($not_del) > 0)
                {
                    ItemDesigner::where('item_id', $item_id)->where('designer_type', $designer_type)->whereNotIn('id', $not_del)->delete();
                }
            }
            else
            {
                ItemDesigner::where('item_id', $item_id)->where('designer_type', $designer_type)->delete();
            }
            
            return redirect('/administrator/items/'.$item_type.'/designers/'.$designer_type.'/'.$item_id.'/');
        }
        
        return view('admin.items.designers')->with([
            'items' => Item::where('type', 1)->get(),
            'assigned_items' => ItemDesigner::where('item_id', $item_id)->where('designer_type', $designer_type)->orderBy('pos', 'ASC')->get(),
            'designer_type' => $designer_type
        ]);
    }
    
    public function delete($type, $id)
    {
        Callback::where('item_id', $id)->delete();
        Collection::where('item_id', $id)->delete();
        Counter::where('item_id', $id)->delete();
        ItemDesigner::where('item_id', $id)->orWhere('designer_id', $id)->delete();
        MenuItem::where('item_id', $id)->delete();
        Recipient::where('item_id', $id)->delete();
        Review::where('item_id', $id)->delete();
        SliderItem::where('item_id', $id)->delete();
        Item::where('id', $id)->delete();
        
        return redirect()->back();
    }
    
    public function callbacks($type, $id)
    {
        return view('admin.items.callbacks')->with([
            'callbacks' => Callback::where('callbacks.item_id', $id)
                ->selectRaw('callbacks.*, recipients.name AS recipient')
                ->leftJoin('recipients', 'recipients.id', '=', 'callbacks.recipient_id')->orderBy('callbacks.created_at', 'DESC')->get(),
            'type' => $type,]);
    }
    
    public function recipients($itemid, Request $request)
    {
        if ($request->isMethod('post'))
        {
            $items = json_decode($request->input('nestable_list_2_output'), 1);
            $i = 0;
            $not_del = [];
            foreach($items as $item)
            {
                $mi = Recipient::find($item['id']);
                if(!$mi)
                    $mi = new Recipient;
                
                $mi->item_id = $itemid;
                $mi->name = $item['name'];
                $mi->email = $item['email'];
                $mi->pos = $i;
                $mi->save();
                $not_del[] = $mi->id;
                $i++;
            }
            
            if(count($not_del) > 0)
            {
                Recipient::where('item_id', $itemid)->whereNotIn('id', $not_del)->delete();
            }
            else
            {
                Recipient::where('item_id', $itemid)->delete();
            }
            
            return redirect('/administrator/items/recipients/'.$itemid);
        }
        
        return view('admin.items.recipients')->with(['items' => Recipient::where('item_id', $itemid)->orderBy('pos', 'ASC')->get()]);
    }
    
    public function delete_callbacks($type, $id)
    {
        Callback::where('id', $id)->delete();
        return redirect()->back();
    }
    
    public function statistic($id)
    {
        /*$data = Statistic::selectRaw('DATE(statistic.created_at) as date, COUNT(st1.id) AS cnt_all, COUNT(DISTINCT statistic.ip) AS cnt_unic')
            ->leftJoin('statistic as st1', 'st1.id', '=', 'statistic.id')
            ->groupBy('date')
            ->get();*/
        $data = Statistic::selectRaw('DATE(statistic.created_at) as date,
            (SELECT COUNT(st1.id) FROM statistic st1 WHERE DATE(statistic.created_at) = DATE(st1.created_at) AND st1.vtype = 0) AS cnt_all,
            (SELECT COUNT(DISTINCT st2.ip) FROM statistic st2 WHERE DATE(statistic.created_at) = DATE(st2.created_at) AND st2.vtype = 0) AS cnt_unic,
            (SELECT COUNT(st1.id) FROM statistic st1 WHERE DATE(statistic.created_at) = DATE(st1.created_at) AND st1.vtype = 1) AS cnt_calls')
            ->groupBy('date')
            ->get();
        
        return view('admin.items.statistic')->with(['data' => $data]);;
    }
}