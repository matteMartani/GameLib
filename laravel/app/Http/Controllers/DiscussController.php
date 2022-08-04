<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;


class DiscussController extends Controller
{
    public function index(){
        $dl= new DataLayer();
        $discussions=$dl->list_discussion_by_posts();

        session_start();
        if(isset($_SESSION['logged'])){
            return view('forum.Forum') -> with('logged', true) -> with('username', $_SESSION['username']) -> with('discussions', $discussions);
        } else {
            return view('forum.Forum') -> with('logged', false) -> with('discussions', $discussions);
        }
    }

    public function createDiscuss(){


        $logged = $_SESSION['logged'];

        return view('forum.AddDiscuss')->with('username', $_SESSION['username']) -> with('logged', $logged);


    }

    public function storeDiscuss(Request $request){
        session_start();
        $dl = new DataLayer();

        $dl->addDiscuss($_SESSION['user_id'], $request->input('titolo'), $request->input('topic'));

        return \redirect(route('forum.index'));
    }

    public function postsDiscuss($disc_id){
        $dl = new DataLayer();
        $discussion = $dl->get_discussion_from_id($disc_id);
        $posts = $discussion->posts;
        session_start();
        if(isset($_SESSION['logged'])){
            return view('forum.Posts') -> with('logged', true) -> with('username', $_SESSION['username']) -> with('posts', $posts) -> with('discussion', $discussion);
        } else {
            return view('forum.Posts') -> with('logged', false) -> with('posts', $posts) -> with('discussion', $discussion);
        }
    }

    public function createPost($disc_id){

        $dl = new DataLayer();

        $logged = $_SESSION['logged'];
        $discussion = $dl->get_discussion_from_id($disc_id);

        return view('forum.AddPost')->with('username', $_SESSION['username']) -> with('logged', $logged) -> with('disc_id', $disc_id) -> with('discussion', $discussion);


    }

    public function storePost(Request $request, $disc_id){
        session_start();
        $dl = new DataLayer();
        $dl->addPost($disc_id, $_SESSION['user_id'], $request->input('content'));
        return \redirect(route('forum.posts', $disc_id));
    }

    public function ajaxDiscuss(Request $request){

        $dl = new DataLayer();
        $titolo = $request->input('titolo');
        if($dl -> find_title($titolo))
        {
            $response = array('found'=>true);
        } else {
            $response = array('found'=>false);
        }
        return response()->json($response);

    }
}
