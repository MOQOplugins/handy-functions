<?php
namespace moqobe\handyfunctions\variables;

use moqobe\handyfunctions\Moqo;

use Craft;

class FunctionsVariable {
    // ******
    // CRAFT SESSION
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

    // ******
    // CONVERTIONS
    // ******

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

    public function convertBytes($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 0) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 0) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 0) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}