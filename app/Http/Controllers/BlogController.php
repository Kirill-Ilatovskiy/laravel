<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        

        $categories = [
            null => __('Все категории'),
            1 => __('Первая категория'),
            2 => __('Вторая категория'),
        ];

        $posts = Post::query()->get(['id', 'title', 'published_at']);

        $posts = Post::query()->limit(12)->get();

       $validated = $request->validate([
           'limit'=> ['nullable', 'integer', 'min:1', 'max:100'],
           'page'=> ['nullable', 'integer', 'min:1', 'max:100'], 
        ]);

        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 12;
        $offset = $limit * ($page - 1);
        $posts = Post::query()->limit($limit)->offset($offset)->get();

        $posts = Post::query()->paginate(12, ['id', 'title', 'published_at']);

        $posts = Post::query()->orderBy('published_at', 'desc')->paginate(12);

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show(Request $request, $post)
    {
        // dd($request->route('category'), $request->route('post'), $request->all());
        // dd($category, $post, $request->all());

        $post = (object) [
            'id' => 123,
            'title' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum <strong>dolor</strong> sit amet consectetur, adipisicing elit. Soluta, qui?',
        ];

        return view('blog.show', compact('post'));
    }

    public function like($post)
    {
        return 'Поставить лайк';
    }
}