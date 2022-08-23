<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    private function fixImageUrl($imgPath){
        return  $imgPath ? asset('/storage/' . $imgPath) : null;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage_default = 10;
        //request è la richiesta completa dell'utente
        $perPage = $request->query('perPage', 12);
        //se la richiesta è sbagliata
        if($perPage < 1 || $perPage > 150){
             $perPage = $perPage_default;

            // return response()->json(['success' => false], 400);
        }

        //con il with richiamo le funzioni del model Post per richiamare user, category e tags e avere tutto nella risposta
        $posts = Post::with(['user', 'category', 'tags'])->paginate($perPage);

        foreach ($posts as $post) {
            $post->image = $this->fixImageUrl($post->image);

        }

        return response()->json([
            'success' => true,
            'response' =>$posts
        ]);
    }

    //post random homepage
    public function random()
    {
        $sql = Post::with(['user', 'category', 'tags'])->whereNotNull('image')->limit(9)->inRandomOrder();
        $posts = $sql->get();

        foreach ($posts as $post) {
            $post->image = $this->fixImageUrl($post->image);

        }

        return response()->json([
            // 'sql'       => $sql->toSql(), // solo per debugging
            'success'   => true,
            'result'    => $posts,
        ]);
    }

    public function show(String $slug)
    {
            $post = Post::with(['user', 'category', 'tags'])->where('slug', $slug)->first();

            if($post) {

                    $post->image = $this->fixImageUrl($post->image);
                    return response()->json([
                        'success' => true,
                        'result' =>$post
                    ]);


                // $post->image = $post->image ? '/storage/' . $post->image : null;
            } else {
                return response()->json([
                    'success' => false,
                ]);
            }
    }
}
