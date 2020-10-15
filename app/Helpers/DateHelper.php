<?php
namespace App\Helpers;
 class DateHelper{
      public static function monthToArabic($month){
            $arMonths = [
                1=>'يناير',
                2=>'فبراير',
                3=>'مارس',
                4=>'أبريل',
                5=>'ماي',
                6=>'يونيو',
                7=>'يوليوز',
                8=>'غشت',
                9=>'سبتمبر',
                10=>'أكتوبر',
                11=>'نونبر',
                12=>'دجنبر'
            ];
            return $arMonths[$month];
      }
 }
