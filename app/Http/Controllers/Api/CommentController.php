<?php

namespace App\Http\Controllers\Api;

use App\Events\OrderStatus;
use App\Http\Controllers\Api\Functions\OrderFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentRequest;
use App\Http\Requests\Api\StoreCommentRequest;
use App\Http\Requests\Api\StoreOrderRequest;
use App\Http\Requests\CompletePayRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\OrderResource;
use App\Jobs\ChangeOrderStatusEmailJob;
//use App\Mail\ChangeOrderStatusMail;
use App\Models\Address;
use App\Models\Comment;
use App\Models\Food;
use App\Models\Foodparty;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderFoods;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    use OrderFunctionsTrait;
    public function getAllComments(CommentRequest $request)
    {
        $request->validated();
        if (isset($request->status))
        {
            return $this->orderJsonResponse(false,'Sending Parameters are Invalid.',403);
        }
        if (isset($request->restaurant_id))
        {
            $comments = Restaurant::find($request->restaurant_id)->comments->where('status',Comment::ENABLE_COMMENT);
            return CommentResource::collection($comments);
        }
        if (isset($request->food_id))
        {
            $comments = Food::find($request->food_id)->comments->where('status',Comment::ENABLE_COMMENT);
            return CommentResource::collection($comments);
        }

    }

    public function addComment(StoreCommentRequest $request)
    {
        $request->validated();
        if ($this->checkOrderCompleted($request->cart_id))
        {
            Comment::create(['user_id'=>auth()->user()->id,'order_id'=>$request->cart_id,'score'=>$request->score,'comment'=>$request->message]);
            return $this->orderJsonResponse(true,'Comment Stored Successfully.',200);
        }
        return $this->orderJsonResponse(false,'Your Order Should Be Completed Before Send Comment.',403);
    }
}
