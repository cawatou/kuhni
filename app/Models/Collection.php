<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $table = 'collections';
    
    public function images()
    {
        return $this->hasMany('App\Models\CollectionImage', 'collection_id');
    }
}