<?php

namespace App\Helpers;

use DB;

class AppHelpers
{

    public function _getBank()
    {
        $result = DB::table('banks')->get();
        $data   = [
            '0' => '(none)'
        ];

        foreach ($result as $item)
        {
            $data[] = $item->name;
        }
        
        return $data;
    }
}