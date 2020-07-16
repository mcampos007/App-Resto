<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionImage extends Model
{
    //
    //$productImage->product
    public function promotion(){
    	return $this->belongTo(Promotion::class);
    }

    //Assesor
    public function getUrlAttribute(){

    	if (substr($this->image,0,4) === "http"){
    		return $this->image;
    	}
    	return 'images/products/'.$this->image; 
    }
}
