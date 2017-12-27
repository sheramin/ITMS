<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Requests;
use Notification;
use App\Notifications\NewHelpRequest;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('requests.request-form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'device_name' => 'required|max:255',
            'requester_name' => 'required|min:2',
            'email' => 'required|email',
            'position' => 'required',
            'quantity' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('requests/form')
                        ->withErrors($validator)
                        ->withInput();
        }

        $newRequest = new Requests;
        $newRequest->requester_name = $request->requester_name;
        $newRequest->email = $request->email;
        $newRequest->position = $request->position;
        $newRequest->item_name = $request->device_name;
        $newRequest->quantity = $request->quantity;
        $newRequest->use_for = $request->usage;
        $newRequest->description = $request->description;
        if($newRequest->save()){
            return "Request sent";
        }else{
            return "Request failed to sent, Sorry <a href='/requests/form'>try again</a>!";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $requests = Requests::all();
        return view('requests.requests-list')->with('requests', $requests);
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
        if( \DB::table('requests')->where('id', $id)->delete() ){
            return response()->json(['response' => 'Request deleted successfully', 'status' => 'success']);
        }else{
            return response()->json(['response' => 'Could not delete Request', 'status' => 'warning']);
        }
    }
}
