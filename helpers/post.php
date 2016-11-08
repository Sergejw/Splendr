<?php

class Post {

    public static function get() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $bool = sizeof($post) == sizeof(array_filter($post));
        
        if ($bool && 
            isset($post['password']) && 
            isset($post['password2']) && 
            $post['password'] === $post['password2']) {
            
            $post['password'] = Password::hash($post['password']);
            unset($post['password2']);
            $post['code'] = rand(1, 99999999);
        }
        
        if ($bool) {            
            return Post::addSession(Post::addLocation(Post::clean($post)));
            
        } else {
            return;
        }
    }

    private static function clean($post) {
        if (isset($post['name'])) {
            $post['name'] = preg_replace('/[^a-züäöß0-9- ]/i', '', 
                            preg_replace('/[ ]{1,}/', ' ', $post['name']));
            
            if (!preg_match('/[a-z0-9]/i', $post['name'])) {
                unset($post);
            }
        }
        
        if (isset($post['tags'])) {
            $post['tags'] = preg_replace('/[^a-züäöß0-9- ]/i', '', 
                            preg_replace('/[ ]{1,}/', ' ', $post['tags']));
            
            if (!preg_match('/[a-z0-9]/i', $post['tags'])) {
                unset($post);
            }
        }
        
        return $post;
    }

    private static function addLocation($post) {
        if (isset($post['ort']) && isset($post['land'])) {
            $result = Map::getCoordinates($post['ort'], $post['land']);
            $post['lat'] = $result['lat'];
            $post['lng'] = $result['lng'];
        }
        
        return $post;
    }
    
    private static function addSession($post) {
        
//        if (isset(Session::get('user')['mail'])) {
//            $post['mail'] = Session::get('user')['mail'];
//        }
        
//        if (!isset($post['id']) && isset(Session::get('user')['id'])) {
//            $post['id'] = Session::get('user')['id'];
//        }
        
        return $post;
    }
    
    public static function getId() {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        if (isset($post['id']) && is_numeric($post['id'])) {            
            return $post['id'];
            
        } else {
            return FALSE;
        }
    }
    
    public static function getQ() {
        return filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
    }
}