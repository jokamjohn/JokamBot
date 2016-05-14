<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Messenger;
use Illuminate\Http\Request;

class BotController extends Controller
{


    /**Bot web hook
     * @param Request $request
     * @return mixed
     */
    public function mBot(Request $request)
    {
        if ($request['hub_verify_token'] == 2244) {
            return response($request->get('hub_challenge'));
        } else {
            return response("Error has occurred");
        }


    }

    public function receive(Request $request)
    {
        //Convert the json into an object
        $object = json_decode(json_encode($request->all()));
        $entry = $object->entry;

        foreach ($entry as $value) {

            $messenger = new Messenger();

            $messenger->pageId = $value->id;
            $messenger->timestamp = $value->time;

            foreach ($value->messaging as $message) {
                $messenger->senderId = $message->sender->id;

                $messenger->recipientId = $message->recipient->id;

                $messenger->message = $message->message->text;

                $messenger->save();
            }
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
