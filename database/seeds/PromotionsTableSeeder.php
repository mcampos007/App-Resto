<?php

use Illuminate\Database\Seeder;
use App\Promotion;
use App\PromotionImage;
class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       // $categories = factory(Category::class,3)->create();
       // $categories->each(function($category){
            $promotions = factory(Promotion::class,3)->create();
            $promotions->each(function($p){
                $images = factory(PromotionImage::class,3)->make();
                $p->images()->saveMany($images);
            });
        
     }
}
