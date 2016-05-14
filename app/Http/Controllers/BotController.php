<?php

namespace App\Http\Controllers;

use App\Bot;
use Illuminate\Http\Request;

use App\Http\Requests;

class BotController extends Controller
{


    /**Bot web hook
     * @param Request $request
     * @return mixed
     */
    public function mBot(Request $request)
    {
        if ($request['hub_verify_token'] == 2244 )
        {
            return response($request->get('hub_challenge'));
        }

        else {
            return response("Error has occurred");
        }


    }

    public function receive(Request $request)
    {
        $sender = $request['entry'][0]['messaging'][0]['sender']['id'];
        $message = $request['entry'][0]['messaging'][0]['message']['text'];

        $bot = new Bot();
        $bot->sender = $sender;
        $bot->text = $message;
        $bot->save();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
