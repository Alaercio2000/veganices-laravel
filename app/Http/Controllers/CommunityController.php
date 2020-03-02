<?php

namespace App\Http\Controllers;

use App\Models\CommunityPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        $communityPosts = CommunityPost::select()
            ->with('user')
            ->where('type', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->limit(6)
            ->get()->toArray();

        foreach($communityPosts as $communityPost) {
            $date = $communityPost['created_at'];
            
            $communityPost['date'] = date("d/m/Y H:i", strtotime($date));

            $data[] = $communityPost;
        }

        // dd($data);

        return view('community.index', ['communityPosts' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('community.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        unset($data['slug']);
        unset($data['_token']);

        $data['user_id'] = Auth::user()->id;

        // dd($data);
        return CommunityPost::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }
}
