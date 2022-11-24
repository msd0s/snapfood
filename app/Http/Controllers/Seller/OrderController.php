<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Api\Functions\OrderFunctionsTrait;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    use OrderFunctionsTrait;
    public function updateStatus(Request $request, Order $order)
    {
        $this->authorize('update', $order);
        $order->update(['orderstatus_id'=>$request->orderStatus]);
        $this->sendChangeOrderStatusEmail($order);
        return redirect()->back()->with(['successMassage'=>'Order Status Updated Successfully.']);
    }

    public function showOrderFoods(Order $order)
    {
        $this->authorize('view', $order);
        $orderFoods = $order->orderfoods;
        return view('panel.Seller.orders.showOrderFoods',compact(['orderFoods']));
    }

    public function showArchivedOrders(Order $order)
    {
        $this->authorize('view', $order);
        $orders = Order::distinct()->where('restaurant_id',auth()->user()->restaurant?->id)->where('orderstatus_id',5)->paginate(5);;
        return view('panel.Seller.orders.showArchivedOrders',compact(['orders']));
    }


}
