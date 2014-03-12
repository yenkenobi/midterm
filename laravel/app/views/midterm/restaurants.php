<h1>Yelp</h1>

<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/11/14
 * Time: 6:05 PM
 */

foreach ($restaurants as $restaurant):
    echo "<h3>$restaurant->restaurant_name($restaurant->city)</h3>";
    echo "<p>$restaurant->type</p>";
    if($restaurant->facebook_page!=NULL){
        echo "<p>Facebook Page: <a href='http://facebook.com/$restaurant->facebook_page'>Here</a></p>";
    }
    else{
        echo "<p>Not on Facebook</p>";
    }
    echo "<p><a href='restaurants/$restaurant->id/reviews'>View Reviews</a></p>";
    echo "<hr>";
endforeach;

?>

