<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;
use App\User;

class QueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Query::get(['id', 'name', 'email', 'phone', 'subject', 'message', 'created_at']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        //return "store";
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'nullable',
        //     'subject' => 'required',
        //     'message' => 'required'
        // ]);
        
        if(!isset($request->name) || !isset($request->email) || !isset($request->subject) || !isset($request->message)) {
            return -2;  // echo "Required fields missing"
        } 
        if(isset($request->user_id)) {
            if(!User::find($request->user_id)) {
                return -3;  // echo "User not found";
            }
        }

        $query = Query::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'user_id' => $request->user_id
        ]);
        

        if($query) {
            return $query->id;
        }
        else {
            return -1;  // echo "Query could not be registered. Please investigate.";
        }
        

        
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
