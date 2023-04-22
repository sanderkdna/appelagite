<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Topic;
use App\Models\Message;
use App\Http\Requests\MessagesFormRequest;
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

    public function getMessage(){
        try{
            $date = date("Y-m-d");
            $m = DB::table('messages')
                    ->where('date', '=', $date)
                    ->where('showed', '=', '0')
                    ->limit(1)
                    ->get();

            $data['showed'] = '1';

            Message::where('id', $m[0]->id)
                ->update($data);




            return $m;


        }catch(Exception $e){

        }
    }
    public function saveMessage(MessagesFormRequest $request){
        try{

            $data = $request->getData();
            $data['date'] = date("Y-m-d");
            Message::create($data);

        }catch(Exception $e){

        }
    }

}
