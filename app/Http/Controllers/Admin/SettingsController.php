<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Item;

class SettingsController extends BackController
{
    public function index(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $settings = $request->input('setting');
            foreach($settings as $k => $set)
            {
                $obj = Setting::where('skey', $k)->first();
                if(!$obj)
                {
                    $obj = new Setting;
                }
                
                $obj->skey = $k;
                $obj->sval = $set;
                $obj->save();
            }
            
            return redirect('/administrator/settings');
        }
        
        return view('admin.settings.index')->with([
            'items' => Setting::getByItem(['map_center_lat', 'map_center_lng'])
        ]);
    }
    
    public function itemset($id, Request $request)
    {
        if ($request->isMethod('post'))
        {
            $settings = $request->input('setting');
            foreach($settings as $k => $set)
            {
                $obj = Setting::where('skey', $k)->first();
                if(!$obj)
                {
                    $obj = new Setting;
                }
                
                $obj->skey = $k;
                $obj->sval = $set;
                $obj->save();
            }
            
            return redirect()->back();
        }
        
        return view('admin.settings.itemset')->with([
            'items' => Setting::getByItem(['code_google', 'code_yandex', 'code_chat'], $id),
            'foritem' => Item::find($id)
        ]);
    }
}