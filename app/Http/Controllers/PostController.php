<?php

namespace App\Http\Controllers;

use App\Elastic\Elastic;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Post $posts
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $posts = Post::paginate(20);
		return view('posts.index', compact('posts'));
	}

    public function create()
    {
        return view('posts.create');
	}

    /**
     * Storing the post
     * @return back to posts
     */
    public function store()
    {
        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        return redirect('posts');
	}

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
	}

    public function search()
    {
        $elastic = app()->make(Elastic::class);

        $search = request('search');

        $query = [
            'multi_match' => [
                'query' => $search,
                'fuzziness' => 'AUTO',
                'fields' => ['title^3','content'],
            ],
        ];

        $parameters = [
            'index' => 'blog',
            'type' => 'post',
            'body' => [
                'query' => $query,
                'highlight' => [
                    'fields' => [
                        'content' => []
                    ]
                ]
            ]
        ];

        $response = $elastic->search($parameters);

        $response = $response['hits']['hits'];

        return $response;

        //return $response['hits']['total'];

        return \Response::json(['response' => $response], 200);
	}
}
