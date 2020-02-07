<?php namespace Waka\Wcms\Contents\Compilers;

use stdClass;
use Waka\Wcms\Models\Need;

class ListNeed
{


    public static function proceed($contents, $dataSourceModel) {
       //trace_log($contents);
        $datas= [];
        foreach($contents as $content ) {
            $needs = Need::get();
            $i=1;
            
            foreach($needs as $need) {
                trace_log(self::cleanMD($need->description));
                $obj = [
                    'value.name' => $need->name,
                    'value.intro' => $need->intro,
                    'value.description' => self::cleanMD($need->description),
                    'image.main_image' => [
                        'path' => $need->getCloudiBaseUrl('main_image','jpg-300-300'),
                        'width' => "40mm",
                        'height' => "40mm",
                        'ratio' => true,
                        ]
                ];
                array_push($datas, $obj);
                $i++;
            }   
        }
        return $datas;
    }

    public static function cleanMD($value) {
        $value = str_replace("**", "", $value);
        $value = str_replace("* ", "- ", $value);
        $value = str_replace("*", "", $value);
        $value = str_replace("  ", "", $value);
        return $value;
    }
}