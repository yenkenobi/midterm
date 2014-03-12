<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/11/14
 * Time: 6:59 PM
 */

namespace Yelp\Facebook;


class FacebookPage{
    private $facebook_page;

    function __construct($facebook_page){
        $this->facebook_page = $facebook_page;
    }

    public function get(){
        $json = file_get_contents("http://graph.facebook.com/$this->facebook_page");
        return json_decode($json);
    }



}