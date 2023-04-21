<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $id = date("Y-m-d");

            $topic = DB::table('topics')
            ->where('date', '=', $id)
            ->get();

            return $topic;

        } catch (Exception $e) {

        }
    }

    public function getStatus()
    {
        try {

            $id = date("Y-m-d");

            $topic = DB::table('settings')
            ->where('id', '=', '1')
            ->get();

            return $topic;

        } catch (Exception $e) {

        }
        //
    }

}
