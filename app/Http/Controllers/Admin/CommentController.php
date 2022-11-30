<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Api\Functions\OrderFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use OrderFunctionsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$comments = Restaurant::find(auth()->user()->restaurant->id)->comments->sortBy('created_at')->toQuery()->paginate(5);
        $comments = Comment::distinct()->requestDelete()->paginate(5);
        return view('panel.Admin.comments.showComments', compact(['comments']));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        try {
            $comment->delete();
            return redirect()->back()->with(['successMassage' => 'Comment was Successfully Deleted.']);
        } catch (\Exception $e) {

        }
    }
}
