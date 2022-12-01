<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Api\Functions\OrderFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    use OrderFunctionsTrait;

    public function changeCommentStatus(Comment $comment)
    {
        $this->authorize('update', $comment);
        try {
            if ($comment->order->restaurant_id == auth()->user()->restaurant->id)
            {
                if ($comment->status == Comment::DISABLE_COMMENT){
                    $status = Comment::ENABLE_COMMENT;
                }else
                {
                    $status = Comment::DISABLE_COMMENT;
                }
                $comment->update(['status'=>$status]);
                return redirect()->back()->with(['successMassage'=>'Comment Status Was Changed Successfully.']);
            }
        }catch (\Throwable $th)
        {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Comment::class);
        $comments = Restaurant::find(auth()->user()->restaurant->id)->comments->sortBy('created_at')->toQuery()->paginate(5);
        return view('panel.Seller.comments.showComments',compact(['comments']));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        try {
            if ($comment->order->restaurant_id == auth()->user()->restaurant->id)
            {
                $comment->update(['answer'=>$request->answer]);
                return redirect()->back()->with(['successMassage'=>'Comment Answer Updated Successfully.']);
            }
        }catch (\Throwable $th)
        {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('update', $comment);
        try {
            if ($comment->order->restaurant_id == auth()->user()->restaurant->id)
            {
                $comment->update(['delete_request'=>Comment::DELETE_REQUEST]);
                return redirect()->back()->with(['successMassage'=>'Delete Request Sent Successfully.']);
            }
        }catch (\Throwable $th)
        {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
