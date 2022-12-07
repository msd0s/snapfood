<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Seller\Functions\OrderFunctionsTrait;
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

    public function showArchivedOrders(Request $request,Order $order)
    {
        $this->authorize('view', $order);
        $orders = $this->getReceivedOrders();
        if (isset($request->from) && $request->from == 'lastweek')
        {
            $orders = $orders->lastWeek();
        }
        if (isset($request->from) && $request->from == 'lastmonth')
        {
            $orders = $orders->lastMonth();
        }
        $orders = $orders->paginate(5);
        $allOrderPrices = $this->allOrderPrices($this->getReceivedOrders()->get());
        return view('panel.Seller.orders.showArchivedOrders',compact(['orders','allOrderPrices']));
    }


}
