<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devices;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('devices.add-form');
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
        $device_name = $request->input('device_name');
        $serial_no = $request->input('serial_no');
        $office_serial_no = $request->input('office_serial_no');
        $specification = $request->input('specification');
        $cost = $request->input('cost');
        $purchase_date = $request->input('purchase_date');
        $quantity = $request->input('quantity');
        $status = $request->input('status');
        $company_name = $request->input('company_name');
        $company_contact = $request->input('company_contact');
        $description = $request->input('description');

        $newDevice = new Devices;
        $newDevice->name = $device_name;
        $newDevice->serial_no = $serial_no;
        $newDevice->office_serial_no = $office_serial_no;
        $newDevice->specification = $specification;
        $newDevice->cost = $cost;
        $newDevice->purchase_date = $purchase_date;
        $newDevice->quantity = $quantity;
        $newDevice->status = $status;
        $newDevice->company_name = $company_name;
        $newDevice->company_contact = $company_contact;
        $newDevice->description = $description;

        if($newDevice->save()){
            return redirect('/devices/list');
        }else{
            return false;
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
        $devices = Devices::all();
        return view('devices.list-devices')->with('devices', $devices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $target_device = Devices::find($id);
        return view('devices.edit-form')->with('device', $target_device);
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
        if( \DB::table('devices')->where('id', $id)->update(['name' => $request->device_name, 'serial_no' => $request->serial_no])){
            return redirect('devices/list');
        }else{
            return "Record not updated!";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( \DB::table('devices')->where('id', $id)->delete() ){
            return redirect('devices/list');
        }else{
            return "Record not deleted!";
        }
    }
}
