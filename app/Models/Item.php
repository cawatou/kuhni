<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'items';
    public $timestamps = false;
    
    public function designers()
    {
        return $this->hasMany('App\Models\Item', 'parent');
    }
    
    public function counters()
    {
        return $this->hasMany('App\Models\Counter', 'item_id');
    }
    
    public function collections()
    {
        return $this->hasMany('App\Models\Collection', 'item_id');
    }
    
    public function slides()
    {
        return $this->hasMany('App\Models\SliderItem', 'item_id');
    }
    
    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'item_id');
    }
    
    public function studio()
    {
        return $this->belongsTo('App\Models\Item', 'parent');
    }

    public function designer_collections()
    {
        return $this->hasMany('App\Models\Collection', 'designer_id');
    }

}