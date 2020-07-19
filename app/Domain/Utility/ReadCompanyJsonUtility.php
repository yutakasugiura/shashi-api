<?php

namespace App\Domain\Utility;

use Illuminate\Support\Collection;

class ReadCompanyJsonUtility
{
    /**
     * 1. Import json
     *
     * 2. Export array
     *
     * @param string $url
     * @return array
     */
    public function convertJsonToArray(string $url): Collection
    {
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8');

        return collect(json_decode($json, true));
    }
}
