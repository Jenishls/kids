<?php

/** @todo make use of a pattern */
function order_decrypt($value) : string
{
    $decrypted = base64_decode($value);
    list($createdAt, $orderNo) = explode('/', $decrypted);
    return $orderNo;
}
