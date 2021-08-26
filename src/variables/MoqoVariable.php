<?php
namespace moqobe\moqo\variables;

use moqobe\moqo\Moqo;

use Craft;

class MoqoVariable {
    // ******
    // 
    // ******
    public function getSessionVariable($name) {
        return Craft::$app->getSession()->get($name);
    }

    public function setSessionVariable($name, $value) {
        return Craft::$app->getSession()->set($name, $value);
    }

    // ******
    // TRANSFORMS
    // ******
    public function shuffle($array, $limit) {
        shuffle($array);

        $shuffledArray = $array;

        if($limit ?? null) {
            if($limit > 0) {
                $shuffledArray = array_splice($shuffledArray, 0, $limit);
            }
        }

        return $shuffledArray;
    }

    public function uniqueArray($array) {
        $uniqueArray = array_unique($array);
        return $uniqueArray;
    }

    public function truncate($text, $origin, $limit, $append) {
        $truncatedText = $text;

        if($origin == 'characters' || $origin == 'chars' || $origin == 'letters' || $origin == 'letter') {
            $truncatedTextByChars = substr($text, 0, $limit);
            if(strlen($text) > strlen($truncatedTextByChars)) {
                $truncatedText = $truncatedTextByChars . $append;
            }
        } else {
            $textArray = explode(' ', $text);
            
            if(count($textArray) > $limit && $limit > 0) {
                $text = implode(' ',array_slice($textArray, 0, $limit)) . $append;
            }
            
            $truncatedText = $text;
        }
        return $truncatedText;
    }

    public function timeDifference($date, $now) {
        if($date ?? null && $now ?? null) {
            $dateObject = (object)[];
            $dateDifference = date_diff($date, $now);
            $dateObject->minutes = $dateDifference->i;
            $dateObject->hours = $dateDifference->h;
            $dateObject->days = $dateDifference->d;
            $dateObject->months = $dateDifference->m;
            $dateObject->years = $dateDifference->y;
            return $dateObject;
        }
    }

    public function base64Encode($string) {
        return base64_encode($string);
    }
    
    public function base64Decode($string) {        
        return base64_decode($string);
    }
}
