<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CommunityPost;

class CommunityAnswerController extends Controller
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
        $request->validate([
            'content' => 'required|string'
        ], [
            'required' => 'Esse campo é obrigatório'
        ]);

        $data = $request->all();

        unset($data['_token']);

        $data['user_id'] = Auth::user()->id;

        // dd($data);
        $communityPost = CommunityPost::create($data);

        return redirect('/community/' . $data['parent_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = CommunityPost::find($id);

        if (Auth::user()->id != $post->user_id) {
            return redirect()->route('community.index');
        }

        return view('community.edit-answer', ['post' => $post]);
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
        $request->validate([
            'content' => 'required|string'
        ], [
            'required' => 'Esse campo é obrigatório'
        ]);

        $data = $request->all();

        unset($data['_token']);
        unset($data['_method']);

        $data['user_id'] = Auth::user()->id;

        // dd($data);
        $communityPost = CommunityPost::where('id', '=', $id)->update($data);

        return redirect('/community/' . $data['parent_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        CommunityPost::where('id', '=', $id)->delete();

        return redirect()->route('community.show', $request->parent_id);
    }
}
