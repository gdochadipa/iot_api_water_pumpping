<?php

namespace App\Http\Controllers;

use App\Models\iot;
use App\Models\iot_status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $successStatus = 200;
    public function index()
    {
        $data = iot::all();
        return response()->json(['result' => $data, 'status' => 'successfull']);
    }


    public function addVolume(Request $request){
        $iot = new iot();

        $iot->volume = (3.14* $request->radius* $request->radius)* $request->height;
        $iot->radius = $request->radius;
        $iot->height = $request->height;
        $iot->status = $request->status;
        $iot->turn_on = $request->turn_on;
        $this->changeTurn($request);
        if($iot->save()){
            return response()->json(['result' => $iot, 'status' => 'successfull'], $this->successStatus);
        }else{
            return response()->json(['result' => "failed"], 401);
        }
    }

    public function changeTurn(Request $request){
        $status = iot_status::find(1);

        if(!is_null($status)){
            $status->turn_on = $request->turn_on;
            
            if ($status->save()) {
                return response()->json(['result' => $status, 'status' => 'successfull'], $this->successStatus);
            } else {
                return response()->json(['result' => "failed"], 401);
            }
        }else{
            $newStatus = new iot_status();
            $newStatus->turn_on = $request->turn_on;
            if ($newStatus->save()) {
                return response()->json(['result' => $newStatus, 'status' => 'successfull'], $this->successStatus);
            } else {
                return response()->json(['result' => "failed"], 401);
            }
        }

    }

    public function getStatusMachine(){
        $data = iot_status::find(1);
        return response()->json(['result' => $data, 'status' => 'successfull']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getLastData()
     {
        $last =  DB::table('iots')->latest('created_at')->first();
        return response()->json(['result' => $last, 'status' => 'successfull']);

     }


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
     * @param  \App\Models\iot  $iot
     * @return \Illuminate\Http\Response
     */
    public function show(iot $iot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\iot  $iot
     * @return \Illuminate\Http\Response
     */
    public function edit(iot $iot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\iot  $iot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, iot $iot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\iot  $iot
     * @return \Illuminate\Http\Response
     */
    public function destroy(iot $iot)
    {
        //
    }
}
