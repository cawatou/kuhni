<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenusController extends BackController
{
    public function index($itemid, Request $request)
    {
        if ($request->isMethod('post'))
        {
            $items = json_decode($request->input('nestable_list_3_output'), 1);
            $i = 0;
            $not_del = [];
            foreach($items as $item)
            {
                $mi = MenuItem::find($item['id']);
                if(!$mi)
                    $mi = new MenuItem;
                
                $mi->parent_id = 0;
                $mi->item_id = $itemid;
                $mi->name = $item['name'];
                $mi->link = $item['link'];
                $mi->pos = $i;
                $mi->save();
                $not_del[] = $mi->id;
                
                if(isset($item['children']) && count($item['children']) > 0)
                {
                    $j = 0;
                    foreach($item['children'] as $sitem)
                    {
                        $smi = MenuItem::find($sitem['id']);
                        if(!$smi)
                            $smi = new MenuItem;
                        
                        $smi->parent_id = $mi->id;
                        $smi->item_id = $itemid;
                        $smi->name = $sitem['name'];
                        $smi->link = $sitem['link'];
                        $smi->pos = $j;
                        $smi->save();
                        $j++;
                        $not_del[] = $smi->id;
                    }
                }
                
                $i++;
            }
            
            if(count($not_del) > 0)
            {
                MenuItem::where('item_id', $itemid)->whereNotIn('id', $not_del)->delete();
            }
            else
            {
                MenuItem::where('item_id', $itemid)->delete();
            }
            
            return redirect('/administrator/menu/'.$itemid);
        }
        
        return view('admin.menus.index')->with([
            'items' => MenuItem::where('item_id', $itemid)->where('parent_id', 0)->orderBy('pos', 'ASC')->get()
        ]);
    }
}