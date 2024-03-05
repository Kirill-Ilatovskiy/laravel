<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       $posts = Post::query()->orderBy('published_at', 'asc')->paginate(12);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(StorePostRequest $request)
    {   

        $validated = $request->validated();
        // $validated = $request->validate([
        //     'title'=> ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:10000']
        // ]);
        
        //    $validated = validator($request->all(), [
        //     'title'=> ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:10000']

        //    ])->validate();

        dd($validated);

        alert1(__('Сохранено!'));

        return redirect()->route('user.posts.show', 123);
    }

    public function show($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet consectetur, adipisicing elit. Soluta, qui?',
        ];

        return view('user.posts.show', compact('post'));
    }

    public function edit($post)
    {
        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet consectetur, adipisicing elit. Soluta, qui?',
        ];

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, $post)
    {
        $validated = $request->validate([
            'title'=> ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:10000'],
            'published_at' => ['nulleble', 'string', 'date'],
            'published' => ['nulleble', 'boolean'],
        ]);

        $post = Post::query()->create([
            'user_id'=> User::query()->value('id'),
            'title'=> $validated['title'],
            'content'=> $validated['content'],
            'published_at'=> $validated['published_at'] ?? null,
            'published'=> $validated['published'] ?? false,
        ]);

        dd($post->toArray());

        alert1(__('Сохранено!'));

        return redirect()->back();
    }

    public function delete($post)
    {
        return redirect()->route('user.posts', $post);
    }

    public function like()
    {
        return 'Лайк + 1';
    }
}