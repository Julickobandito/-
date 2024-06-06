<?php

if (! function_exists('strip_first_segment')) {
    /**
     * Strip first segment from string
     * @param $source string
     * @param $separator string
     * @return string
     */
    function strip_first_segment($source, $separator='-'): string
    {
        return trim(strstr($source, $separator), '-');
    }
}

if (! function_exists('pg_unpack_array')) {
    /**
     * Unpack postgres array field value {1,2,3}
     * @return false|string
     */
    function pg_unpack_array($array)
    {
        return json_decode(str_replace(['{', '}'], ['[', ']'], $array));
    }
}

if (! function_exists('pg_unpack_array_str')) {
    /**
     * Unpack postgres array field string value {some value 1,some value 2}
     * @return false|string
     */
    function pg_unpack_array_str($array)
    {
        $array_str = explode(',', str_replace(['{', '}'], ['', ''], $array));
        return $array_str;
    }
}

if (! function_exists('format_book_numbers')) {
    /**
     * Formatting book numbers
     * @return false|string
     */
    function format_book_numbers($numbers)
    {   
        $arr = pg_unpack_array_str($numbers);
        if($arr[0] == 'NULL') {
            $result = '-';
        } else {
            $last = count($arr) - 1;
            $result = "№ {$arr[0]} - {$arr[$last]}";
        }
        return $result;
    }
}

if (! function_exists('get_book_type')) {
    /**
     * Get book type from url
     * @return false|string
     */
    function get_book_type()
    {
        $type = '';

        $url = request()->url();
        if(strpos($url, '/income-book') !== false) {
            $type = 'income';
        }
        if(strpos($url, '/inventory-book') !== false) {
            $type = 'inventory';
        }
        if(strpos($url, '/special-book') !== false) {
            $type = 'special';
        }
        return $type;
    }
}

if (!function_exists('transliterate')) {
    /**
     * Transliterate some cyrillic text to latin
     * I made some trick as alternative, because on server the intl extension don't works.
     */
    function transliterate($textcyr = null) {
        $cyr = [
            'ж',  'ч',  'щ',   'ш',  'і', 'є',  'ї',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж',  'Ч',  'Щ',   'Ш',  'І', 'Є',  'Ї',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я'
        ];
        $lat = array(
            'zh', 'ch', 'sht', 'sh', 'i', 'ye', 'yi', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'y', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', "'", 'ia',
            'Zh', 'Ch', 'Sht', 'Sh', 'I', 'Ye', 'Yi', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'Y', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', "'", 'Ia');
        if($textcyr)
            return str_replace($cyr, $lat, $textcyr);
        else
            return null;
    }
}

if (!function_exists('slugify')) {
    /**
     * I made some trick as alternative, because on server the intl extension don't works.
     */
    function slugify($text, string $divider = '-') {

        // transliterate cyrillic before
        $text = transliterate($text);
        
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);
        
        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);
        
        if (empty($text)) {
            return 'n-a';
        }
        
        return $text;
    }
}
