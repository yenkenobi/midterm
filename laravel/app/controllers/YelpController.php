<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/11/14
 * Time: 6:06 PM
 */

class YelpController extends BaseController {

    public function listRestaurants(){
        $restaurants = Restaurant::all();




        return View::make('midterm/restaurants', [
            'restaurants' => $restaurants,
        ]);
    }


    public function getReviews(){

        $restaurant_id = Route::input('id');

        $restaurant = Restaurant::select('restaurant_name','facebook_page')
            ->where('id','=',$restaurant_id);

        $restaurant = $restaurant->take(1)->get();

        $reviews = Review::select('review_description','rating')
            ->where('restaurant_id','=',$restaurant_id);

        $reviews = $reviews->take(30)->get();

        //var_dump($reviews->toArray());

        return View::make('midterm/reviews', [
           'restaurant' => $restaurant->get(0),
            'reviews' => $reviews
        ]);

    }

} 