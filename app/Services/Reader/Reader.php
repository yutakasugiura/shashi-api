<?php

namespace App\Services\Reader;

class Reader
{
    public function readJson($url)
    {
        $url = base_path($url);

        $json = file_get_contents($url);

        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        //連想配列として返却
        return  json_decode($json, true);
    }
}
