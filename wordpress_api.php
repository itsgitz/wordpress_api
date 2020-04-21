<?php

/**
 * @author: Anggit M Ginanjar
 * @email: anggit.ginanjar@outlook.com
 * @link: https://developer.wordpress.org/rest-api/reference/posts/
 * @link: https://rudrastyh.com/wordpress/rest-api-create-delete-posts.html
 */

require './class/class.WpApi.php';

$wpApi = new \WpApi\Api();

$action = readline('Action (Example: get_post|create_post): ');

switch ($action) {
    case $wpApi::GET_POST:

        /**
         * Get all posts
         */
        $wpApi->getPosts($action);

        break;

    case $wpApi::CREATE_POST:

        /**
         *  Create one post
         */
        $wpApi->createPost($action);

        break;

    default:
        break;
}
