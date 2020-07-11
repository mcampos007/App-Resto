<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //$category->products
    public function products(){

    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
    	$featured_Image_url = $this->image;
    	if(!$featured_Image_url)
    	{
    		return 'images/products/default.jpg';
    	}
    	$featured_Image_url = $this->image;
	   	if (substr($this->image,0,4) === "http"){
    		return $this->image;
    	}
    	return '/images/products/'.$this->image; 
    }
    	
}


	// if (!$featured_Image_url)
 //    	{
 //    		return 'images/products/default.jpg';
 //    	}
 //    	return $featured_Image_url;
