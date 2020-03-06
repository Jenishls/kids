<?php

use App\Model\Order;

/** @todo use pattern */
function order_encrypt(Order $order) :string
{
    return base64_encode($order->created_at."/".$order->order_no);
}
