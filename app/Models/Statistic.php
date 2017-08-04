<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
	protected $table = 'statistic';
    
    public static function writeInfo($ip, $id, $vtype)
    {
        $writable = true;
        if($vtype == 0)
        {
            $date = self::where('ip', $ip)->where('vtype', 0)->pluck('created_at');
            if($date && (time() - strtotime($date)) < 60)
            {
                $writable = false;
            }
        }
        
        if($writable)
        {
            $item = new self;
            $item->ip = $ip;
            $item->item_id = $id;
            $item->vtype = $vtype;
            $item->save();
        }
    }
}