<?php

namespace App\Helpers;
class StringHelper{
    public static function keywords($text){
        $stopWords = array('أين','متى','إلى','من','و','هم','هن','مثل','أين','لأن','أمام','خلف','ثم','تم','في','منهم','منهما','أخرى','مع','فقط','الذين','هذا','قبل','له','ولو','فيه','او','لا','كانت','ماذا','لماذا','هاته','فذالك','لهم','دون','كي','وهو', "الآن", "مثل", "إذن","يعني",'أما','ليس','قد');

        $unwantedChars = array(',', '!', '?',':','"','،',';','-','%','.','&','|','(',')','[',']','@','<','>');
        $text = preg_replace('/\s\s+/i', '', $text);
        $text = str_replace($unwantedChars,'',$text);
        preg_match_all('/\b.*?\b/i', $text, $allTheWords);
        $allTheWords = explode(' ',$text);

        foreach ( $allTheWords as $key=>$item ) {
            if ( $item == '' || in_array($item, $stopWords) || strlen($item) <= 3 ) {
                unset($allTheWords[$key]);
            }
        }
        $wordCountArr = array();

        if ( is_array($allTheWords) ) {
            foreach ( $allTheWords as $key => $val ) {

                if ( isset($wordCountArr[$val]) ) {
                    $wordCountArr[$val]++;
                } else {
                    $wordCountArr[$val] = 1;
                }
            }
        }

        arsort($wordCountArr);

        $wordCountArr = array_slice($wordCountArr, 0, 10);

        $words="";
        foreach  ($wordCountArr as $key=>$value)
            $words .= ", " . $key ;
        return trim($words,",");

    }


}
