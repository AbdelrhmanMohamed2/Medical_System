<?php

namespace App\Http\Controllers;

use App\Models\User;

class SearchController extends Controller
{
    public function result($page_name, $searching_keyword)
    {
        return response()->json([

            'data' => $this->getData(trim($page_name), "%$searching_keyword%")
        ]);
    }

    private function getType($page_name)
    {
        if (in_array($page_name, ['Doctors','Patients'])) {
            return substr($page_name, 0, -1);
        }
        return null;
    }

    private function getData($page_name, $searching_keyword)
    {
        $type = $this->getType($page_name);
        return User::where('type', $type)->where('name', 'like', $searching_keyword)->with($type)->get(['id','name', 'type' ]);
    }
}
