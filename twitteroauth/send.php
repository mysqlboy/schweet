<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include './twitteroauth/OAuth.php';
include './twitteroauth/twitteroauth.php';

class twat {
    
    private $tweet='';
    private $tweetbody= array();
    private $msg = '';
    private $consumerKey = 'GgtRdQ7h5j1Tya6aTpWdKQ';
    private $consumerSecret = 'GvOau19tzjvJW8jlOnvROC9Qoaq1VeZBPbQbo0ApsRI';
    private $oAuthToken = '101830860-qgSSGbgXO4BKDnD0uNWoNYKiqMezTQANJt9Cb7UC';
    private $oAuthSecret = 'Px8rU8unN9sS7UrpPuO4llW5sHzzAvAdfcyII3Slic';
    
    public function __construct() {
        //$this->msg = $message;
        $this->tweet = new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->oAuthToken, $this->oAuthSecret);
    }
    
    public function setTweet ( $lat, $long, $message ) {
        // add the long and lat to the tweet
        $this->tweetbody = array('status' => $message);
        $this->tweetbody['lat'] = $lat;
        $this->tweetbody['long'] = $long;
        
        return $this->tweetbody;
    }
    
    public function showMsg () {
        return $this->msg;
        
    }
    
    public function sendit (){
        // sends the tweet
        if (isset($this->msg)){
            $this->tweet->post('statuses/update', $this->tweetbody);
            //echo 'success: ' . date(DATE_RFC822);
        } else {
            // add logging here
            echo "Your message wasn't sent! Arse!!!";
        }
    } // sendit
    
//        public function sendit (){
//        // sends the tweet
//        if (isset($this->msg)){
//            $this->tweet->post('statuses/update', array('status' => $this->msg));
//            echo 'success: ' . date(DATE_RFC822);
//        } else {
//            echo "Your message wasn't sent! Arse!!!";
//        }
//    } // sendit
    
} //class

$trial = new twat();
$tweeta = $trial->setTweet('51.4624', '-2.6011' , '@beeptreat ftw');
print_r($tweeta);
//$trial->setExtra();
$trial->sendit();
?>

    