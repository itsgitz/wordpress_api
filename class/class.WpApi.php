<?php

namespace WpApi;

/**
 * 
 * 
 * WpApi class
 * 
 */

class Api
{
    private $apiUrl;
    private $login;
    
    const GET_POST = 'get_post';
    const CREATE_POST = 'create_post';

    public function __construct()
    {
        $this->apiUrl = "https://st.itsgitz.com/wp-json/wp/v2/posts";
        $this->login = "api:rMvs CGzm NVLP eCTi aqww bX77";
    }

    /**
     * @param string action
     * @param string postfield (url param)
     * @param array curl result
     */
    private function apiRequest($action, $postfield = null)
    {
        // empty result from here
        $result = [];

        $ch = curl_init();
    
        switch ($action) {
            case self::GET_POST:
                curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
                break;
    
            case self::CREATE_POST:

                curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
                curl_setopt($ch, CURLOPT_USERPWD, $this->login);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postfield);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
                break;
        }
    
        $result = curl_exec($ch);
        curl_close($ch);
    
        return $result;
    }
    
    /**
     * createPost
     * 
     * Posting content on WP
     * 
     * @param string action
     */
    public function createPost($action)
    {
        $title = readline("Title: ");
        $content = readline("Content: ");
        $status = 'publish';
    
        $postfield = "content=$content&title=$title&status=$status";
    
        print_r($this->apiRequest($action, $postfield));
    }
    
    /**
     * getPosts
     * 
     * Get all posts from WP
     * 
     * @param string action
     */
    public function getPosts($action)
    {
        print_r($this->apiRequest($action));
    }
    
}