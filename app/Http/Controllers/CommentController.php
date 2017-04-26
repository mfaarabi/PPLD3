<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use App\Thread;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store']]);
    }
    //
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
    public function store(PostCommentRequest $request)
    {
        $comment = new Comment($request->all());
        $saved = Auth::user()->comments()->save($comment);
        if(!is_null($saved)){
            return redirect()->back();
        } else {
            abort(500);
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
        
        $destroyTarget=Comment::where('id', $id)->first();
        //Soft Delete
        if(is_null(Auth::user())){
            abort(401, 'Unauthorized');
        }
        if($destroyTarget->comment_author->id==Auth::user()->id){

            $destroyTarget->delete();
            return redirect()->back();
        }else{
            return response()->view('error_403', [], 403);
        }

    }
}
