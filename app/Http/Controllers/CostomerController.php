<?php

namespace App\Http\Controllers;

use App\Models\costomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CostomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function show(costomer $costomer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function edit(costomer $costomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, costomer $costomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\costomer  $costomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(costomer $costomer)
    {
        //
    }

    public function login(Request $req)
    {
        $user = costomer::where('email', $req->email)->first();

        if (! $user || ! Hash::check($req->password, $user->password)) {
            return response([
                'msg' => ['The provided credentials are incorrect.'],
            ],501);
        }

        return response(["token"=>$user->createToken($req->email)->plainTextToken,"user"=> $user,"status"=>true,"store_id"=>$user->store_id ],200);
    }
}
