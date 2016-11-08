<?php

class Map {

    public static function getCoordinates($city, $country) {
        $file_content = file_get_contents('http://maps.google.com/maps/api/geocode/xml?address=' . $city . ',' . $country);
        $xml = new SimpleXMLElement($file_content);
        
        $result['lat'] = $xml->result->geometry->location->lat;
        $result['lng'] = $xml->result->geometry->location->lng;
        
        return $result;
    }
}