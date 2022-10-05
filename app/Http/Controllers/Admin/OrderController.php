<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\ShippingType;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::with(['payment', 'shipping', 'updatedby'])->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payments = PaymentMethod::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shippings = ShippingType::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('payment', 'shipping', 'updatedby');

        return view('admin.orders.edit', compact('order', 'payments', 'shippings'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }
}
