<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
	protected $table = 'menu_items';
    public $timestamps = false;
    
    public function subitems()
    {
        return $this->hasMany('App\Models\MenuItem', 'parent_id');
    }
}