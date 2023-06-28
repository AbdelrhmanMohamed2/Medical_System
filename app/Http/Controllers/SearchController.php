<?php

namespace App\Http\Controllers;

use App\Models\{Doctor, Patient};
use App\Models\User;
use Illuminate\Http\Request;

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
        if (in_array($page_name, ['Doctors', 'Patients'])) {
            return substr($page_name, 0, -1);
        }
        return null;
    }

    private function getData($page_name, $searching_keyword)
    {
        $type = $this->getType($page_name);
        return User::where('type', $type)->where('name', 'like', $searching_keyword)->orWhere('phone', 'like', $searching_keyword)->with($type)->get(['id', 'name', 'type']);
    }

    public function filter(Request $request)
    {
        $filter = $request->query('name');
        $id = $request->query('id');
        $data = null;

        if (in_array($filter, ['Doctor', 'Patient'])) {
            $data = app()->make('App\\Models\\' . $filter);
            if ($id) {
                $data = $data::where('id', $id)->with(['user', 'examinations' => function ($query) {
                    $query->orderBy('time');
                }])->get();
            } else {
                $data = $data::with(['user'])->get();
            }
        }

        return response()->json([
            'filter' => $filter,
            'data' => $data,
            'id' => $id,
        ]);
    }
}
