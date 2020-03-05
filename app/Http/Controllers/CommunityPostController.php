<?php

namespace App\Http\Controllers;

use App\Models\CommunityPost;
use App\Models\Tag;
use App\Models\TagCommunityPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommunityPostController extends Controller
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
            ->paginate(5);

        foreach($communityPosts as $communityPost) {

            $totalComments = CommunityPost::select()
                ->where('type', '=', '1')
                ->where('parent_id', '=', $communityPost['id'])
                ->orderBy('created_at', 'DESC')
                ->count();
               
            if($totalComments == 1) {
                $communityPost['totalComments'] = $totalComments .' Comentário';
            } elseif ($totalComments == 0) {
                $communityPost['totalComments'] = 'Sem comentários';
            } else {
                $communityPost['totalComments'] = $totalComments .' Comentários';
            }

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
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'slug' => 'required|string'
        ], [
            'max' => 'O número máximo de caracteres é :max',
            'required' => 'Campo obrigatório'
        ]);

        $data = $request->all();

        $str = str_replace(' ', '', $data['slug']);

        $tags = explode(',', $str);

        unset($data['slug']);
        unset($data['_token']);

        $data['user_id'] = Auth::user()->id;

        // dd($data);
        $communityPost = CommunityPost::create($data);

        foreach($tags as $tag){
            $slug = strtolower($this->removeSpecialCharacters($tag));

            $result = Tag::select()->where('slug', '=', $slug)->get()->toArray();

            if(empty($result)) {
                $createdTag = Tag::create(['slug' => $slug]);
                TagCommunityPost::create(['tags_id' => $createdTag->id, 'community_post_id' => $communityPost->id]);
            } else {
                TagCommunityPost::create(['tags_id' => current($result)['id'], 'community_post_id' => $communityPost->id]);
            }
        }

        return redirect('/community/' . $communityPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::user()->id;

        $dataAnswer = [];
        $post = CommunityPost::find($id);

        $datePost = $post['created_at'];
        $post['date'] = date("d/m/Y H:i", strtotime($datePost));

        $tags = Tag::select('slug', 'tags.id')
            ->join('tags_community_posts', 'tags.id', '=', 'tags_community_posts.tags_id')
            ->where('community_post_id', '=', $id)
            ->get()->toArray();

        $answers = CommunityPost::select()
            ->with('user')
            ->where('type', '=', '1')
            ->where('parent_id', '=', $id)
            ->orderBy('created_at', 'DESC')
            ->limit(10)
            ->get()->toArray();

        
        foreach($answers as $answer) {
        
            $date = $answer['created_at'];
            $answer['date'] = date("d/m/Y H:i", strtotime($date));

            $dataAnswer[] = $answer;

        }
        
        return view('community.show', [
            'post' => $post,
            'answers' => $dataAnswer,
            'userId' => $userId,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = CommunityPost::find($id);
        $tags = Tag::select('slug')
            ->join('tags_community_posts', 'tags.id', '=', 'tags_community_posts.tags_id')
            ->where('community_post_id', '=', $id)
            ->get()->toArray();

        foreach($tags as $tag) {
            $dataTags[] = $tag['slug'];
        }

        $post['slug'] = implode(", ", $dataTags);

        if (Auth::user()->id != $post->user_id) {
            return redirect()->route('community.index');
        }

        return view('community.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string',
            'slug' => 'required|string'
        ], [
            'max' => 'O número máximo de caracteres é :max',
            'required' => 'Campo obrigatório'
        ]);

        $data = $request->all();

        TagCommunityPost::where('community_post_id', '=', $id)->delete();

        $str = str_replace(' ', '', $data['slug']);

        $tags = explode(',', $str);

        unset($data['slug']);
        unset($data['_token']);
        unset($data['_method']);

        $data['user_id'] = Auth::user()->id;

        // dd($data);
        $communityPost = CommunityPost::where('id', '=', $id)->update($data);

        foreach($tags as $tag){
            $slug = strtolower($this->removeSpecialCharacters($tag));

            $result = Tag::select()->where('slug', '=', $slug)->get()->toArray();

            if(empty($result)) {
                $createdTag = Tag::create(['slug' => $slug]);
                TagCommunityPost::create(['tags_id' => $createdTag->id, 'community_post_id' => $id]);
            } else {
                TagCommunityPost::create(['tags_id' => current($result)['id'], 'community_post_id' => $id]);
            }
        }

        return redirect('/community/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommunityPost::where('id', '=', $id)->delete();
        TagCommunityPost::where('community_post_id', '=', $id)->delete();

        return redirect()->route('community.index');
    }

    private function removeSpecialCharacters($text) 
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('[^-\w]+', '', $text);
        $text = trim($text, '-');
        $text = preg_replace('-+', '-', $text);
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function list($slug)
    {
        $tags = Tag::select('id')
            ->where('slug', '=', $slug)
            ->get()->toArray();

        if(empty($tags)){
            return false;
        }

        $resTags = TagCommunityPost::select('community_post_id')
            ->whereIn('tags_id', $tags)->get()->toArray();

        $communityPosts = CommunityPost::select()
            ->with('user')
            ->whereIn('id', $resTags)->get()->toArray();

        $user = Auth::user()->id;

        foreach($communityPosts as $communityPost) {

            $totalComments = CommunityPost::select()
                ->where('type', '=', '1')
                ->where('parent_id', '=', $communityPost['id'])
                ->orderBy('created_at', 'DESC')
                ->limit(10)
                ->count();
            
                
            if($totalComments == 1) {
                $communityPost['totalComments'] = $totalComments .' Comentário';
            } elseif ($totalComments == 0) {
                $communityPost['totalComments'] = 'Sem comentários';
            } else {
                $communityPost['totalComments'] = $totalComments .' Comentários';
            }

            $date = $communityPost['created_at'];
            $communityPost['date'] = date("d/m/Y H:i", strtotime($date));
            $posts[] = $communityPost;
        }

        
        return view('community.list-post', ['posts' => $posts, 'user' => $user]);
    }
}
