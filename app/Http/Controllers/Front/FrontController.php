<?php 
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Setting;
use App\Models\Statistic;

class FrontController extends Controller
{
    public function __construct()
    {
        view()->share(['studio' => Item::where('type', 0)->where('is_active', 1)->get(), 'phone_num' => '',
        'settings' => Setting::getByItem(['map_center_lat', 'map_center_lng'])]);
    }
}