<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $table = 'settings';
    public $timestamps = false;
    
    public static function getAll()
    {
        $items = self::lists('sval', 'skey');
        return $items;
    }
    
    public static function getByItem($names, $id = false)
    {
        $setnames = [];
        foreach($names as $name)
        {
            if($id)
                $setnames[] = $name.'-'.$id;
            else
                $setnames[] = $name;
        }
        $items = self::whereIn('skey', $setnames)->lists('sval', 'skey');
        $return = [];
        foreach($setnames as $sn)
        {
            $return[$sn] = (isset($items[$sn])) ? $items[$sn] : '';
        }
        return $return;
    }
}