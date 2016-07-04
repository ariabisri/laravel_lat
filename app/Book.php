<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillabl=['title' , 'author_id' , 'amount'];
    public function author()
    {
    	return $this->belongsTo('App\Author');
    }
}
