<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::where('id', '=', $id)->with('comments')->first();
        if(is_null($thread)){
            abort(404);
        }
        $thread->views = $thread->views + 1;
       if( $thread->update()){
           return view('show_thread', [
               'title' => $thread->nama_thread,
               'thread' => $thread,
               'current_user' => Auth::user()
           ]);
       } else {
           abort(500);
       }

    }
}