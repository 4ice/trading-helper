<?php

namespace App\Http\Controllers;

use Auth;
use App\Repositories\UserBalanceRecordRepository;
use App\UserBalanceRecord;
use Illuminate\Http\Request;

class UserBalanceRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
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
        $userBalanceRecord = app(UserBalanceRecordRepository::class)->create($request->all(), Auth::user());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserBalanceRecord  $userBalanceRecord
     * @return \Illuminate\Http\Response
     */
    public function show(UserBalanceRecord $userBalanceRecord)
    {
        //
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserBalanceRecord  $userBalanceRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBalanceRecord $userBalanceRecord)
    {
        //
        dd('edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserBalanceRecord  $userBalanceRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserBalanceRecord $userBalanceRecord)
    {
        //
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserBalanceRecord  $userBalanceRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBalanceRecord $userBalanceRecord)
    {
        //
        dd('destroy');
    }
}
