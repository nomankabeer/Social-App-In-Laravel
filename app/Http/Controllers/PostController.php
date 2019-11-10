<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;
class PostController extends Controller
{
    protected $postRepository = null;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public function index()
    {
        $posts = $this->postRepository->getPosts();
        return view('index' , compact('posts'));
    }
    public function store(Request $request)
    {
        $this->postRepository->storePost($request);
        return redirect()->route('index');
    }
     public function postDetails($id){
        $post = $this->postRepository->getPostDetail($id);
        return view('post_detail' , compact('post'));
     }
     public function LikeDislikePost(Request $request){
        return $this->postRepository->LikeDislikePost($request);
     }

     public function AddComment(Request $request){
        return $this->postRepository->addCommentToPost($request);
     }
    public function getComment($id){
        return $this->postRepository->getPostComments($id);
    }

    public function followUser(Request $request){
      return $this->postRepository->followThisUser($request);
    }
}
