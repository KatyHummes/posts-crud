<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        return view('welcome', compact('posts'));
    }

    public function create(PostRequest $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'message' => $request->input('message')
        ]);

        return redirect()->back()->with('success', 'Post criado com sucesso');
    }

    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $final_date = $request->input('final_date');
        $title = $request->input('title');

        $posts = Post::where(function ($query) use ($start_date, $final_date, $title) {
            if (!empty($start_date)) {
                $query->whereDate('created_at', '>=', $start_date);
            }

            if (!empty($final_date)) {
                $query->whereDate('created_at', '<=', $final_date);
            }

            if (!empty($title)) {
                $query->where('title', 'like', '%' . $title . '%');
            }
        })->paginate(5);

        $posts->appends(['start_date' => $start_date, 'final_date' => $final_date, 'title' => $title]);

        return view('welcome', compact('posts'));
    }


    public function delete($id)
    {
        // dd($id);

        $post = Post::find($id);

        $post->delete();

        return redirect()->back()->with('deletePost', 'Post deletado com sucesso.');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->update([
            'title' => $request->input('title'),
            'message' => $request->input('message')
        ]);

        return redirect()->route('index')->with('updated', 'Post atualizado com sucesso');

    }

    public function view($id)
    {
        $post = Post::find($id);

        return view('view', compact('post'));
    }
}
