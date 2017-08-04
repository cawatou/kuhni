<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Item;

class BackController extends Controller
{
    public $subdomain = false;
    
    public function __construct()
    {
        $user = Auth::user();
        
        if($user->is_admin == 0)
        {
            echo '404';
            exit;
        }
        
        $app_url = config('app.url');
        $host = $_SERVER['HTTP_HOST'];
        
        if($host != $app_url)
        {
            $ex = explode('.', $host);
            $this->subdomain = (strlen($ex[0]) > 0) ? $ex[0] : false;
        }
        
        $basepanel = 'admin.panel';
        if($this->subdomain)
        {
            $item = Item::find($user->item_id);
            if($item && $item->url != $this->subdomain)
            {
                echo '4044';
                exit;
            }
            
            $basepanel = 'adminsub.panel';
        }
        
        $perms = json_decode($user->perms);
        view()->share(['user_perms' => $perms, 'subdomain' => $this->subdomain, 'basepanel' => $basepanel]);
    }
}