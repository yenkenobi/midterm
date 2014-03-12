<h1>Yelp</h1>

<h2>Reviews for <?php echo $restaurant->restaurant_name ?></h2>

<h3>Facebook Activity</h3>

    <?php if($restaurant->facebook_page!=NULL){
        //echo "$restaurant->facebook_page";

        $fbpage = new \Yelp\Facebook\FacebookPage($restaurant->facebook_page);
        $fbpage = $fbpage->get();

        //var_dump($fbpage);

        echo "<ul>";
        echo "<li>Likes: $fbpage->likes </li>";
        echo "<li>Checkins: $fbpage->checkins</li>";
        echo "</ul>";



        foreach ($reviews as $review):
            echo "<hr>";
           // echo "<p>$review->rating</p>";
           for($i=1;$i<=$review->rating;$i++){

               echo "<img src='http://www.clker.com/cliparts/y/h/U/U/D/P/yellow-star-md.png'  height='42' width='42'>";

           }

           echo "<p>$review->review_description</p>";
        endforeach;

    }
    else {
        echo "<h4>No Facebook Activity Available</h4>";
    }




