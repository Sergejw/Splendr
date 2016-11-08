<?php

class Tags {

    public static function get($tags) {
        
        for ($i = 0; $i < sizeof($tags); $i++) {
            $result .= ' ' . $tags[$i]['tags'];
        }
        
        return array_unique(array_filter(explode(' ', $result)));
    }
}