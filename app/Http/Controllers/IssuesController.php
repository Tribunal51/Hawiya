<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Issue;
use App\User;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Issue::get(['id', 'user_id', 'title', 'issue']);
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
        if(!isset($request->user_id) || !isset($request->title) || !isset($request->issue)) {
            return -2;  // echo "Required fields missing.";
        }
        if(!User::find($request->user_id)) {
            return -3;  // echo "User does not exist.";
        }
        $issue = new Issue;
        $issue->user_id = $request->user_id;
        $issue->title = $request->title;
        $issue->issue = $request->issue;
        if($issue->save()) {
            return $issue->id;  // echo "Issue created.";
        }
        else {
            return -1;  // echo "Error in creating Issue. Please investigate.";
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
        $issue = Issue::find($id)->get(['user_id', 'title', 'issue']);
        return $issue;
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

    public function userIssues($id) {
        $issues = Issue::where('user_id', '=', $id)->get(['id', 'title', 'issue', 'created_at','updated_at']);
        return $issues;
    }

    

}
