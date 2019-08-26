<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\activitylog;
use App\Http\Middleware\activity_log;
use Carbon\Carbon;
use Illuminate\Auth\EloquentUserProvider;
use eloquent;

class ActivitylogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $date=new Carbon();
        // $start=$date->startOfMonth();
        // // dd($start);
        // $end=$date->endOfMonth();
        // dd(activitylog::whereBetween('created_at',[$start->format('d-m-y'),$end->format('d-m-y')])->get());
        //  dd($start->format('d-m-y'));
    $activitylogs=activitylog::orderBy('created_at','desc')->paginate(5);
    return view('activitylog.activitylog',compact('activitylogs'));
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
