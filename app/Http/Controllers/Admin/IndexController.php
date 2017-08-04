<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BackController;
use Auth;
use App\Models\Item;

class IndexController extends BackController
{
    public function index()
    {
        $user = Auth::user();
        
        if($user->item_id == 0 && !$this->subdomain)
        {
            return view('admin.index.index');
        }
        else
        {
            $item = Item::find($user->item_id);
            
            if(!$item || $this->subdomain != $item->url)
            {
                echo '404';
                exit;
            }
            
            if($item->type == 0)
                $type = 'studio';
            elseif($item->type == 1)
                $type = 'designers';
            
            return view('adminsub.index.index')->with(['item' => $item, 'type' => $type]);
        }
    }
}