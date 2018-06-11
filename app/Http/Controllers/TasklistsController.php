<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tasklist;

class TasklistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
         $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasklists = $user->tasklists()->orderBy('created_at', 'desc')->paginate(10);
            
            //$tasks = Task::all();
            $data = [
                'user' => $user,
                'tasklists' => $tasklists,
            ];
            return view('tasklists.index', $data);
        }else {
            return view('welcome');
}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasklist = new Tasklist;

        return view('tasklists.create', [
            'tasklist' => $tasklist,
        ]); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'status' => 'required|max:10',   // add
            'content' => 'required|max:191',
        ]);
       $tasklist = new Tasklist;
       $tasklist->status =$request->status;
        $tasklist->content = $request->content;
         $tasklist->user_id=\Auth::user()->id;
        $tasklist->save();

        return redirect('/');  //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
          if(\Auth::check())
        {
        $tasklist = Tasklist::find($id);
        $user = \Auth::user();
        
        if (\Auth::user()->id === $tasklist->user_id) {
        return view('tasklists.show', [
            'tasklist' => $tasklist,
            'user' => $user,
        ]);
        }
        else{
           return redirect('/');
            }
        }
    else{
        return view ('welcome');
    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if(\Auth::check())
        {
        $tasklist = Tasklist::find($id);
        $user = \Auth::user();
        
        if (\Auth::user()->id === $tasklist->user_id) {
        return view('tasklists.edit', [
            'tasklist' => $tasklist,
            'user' => $user,
        ]);
        }
        else{
           return redirect('/');
            }
        }
    else{
        return view ('welcome');
    }
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
        $this->validate($request, [
            'status' => 'required|max:10',   // add
            'content' => 'required|max:191',
        ]);
         $tasklist = Tasklist::find($id);
         $tasklist->status =$request->status;
        $tasklist->content = $request->content;
       
        $tasklist->save();

        return redirect('/');//
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $tasklist = Tasklist::find($id);
        $tasklist->delete();

        return redirect('/');//
    }
}
