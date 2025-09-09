<?php

use App\Models\BalanceMessage;
use App\Models\Banner;
use App\Models\Message;
use App\Models\Order;
use App\Models\ProductReview;
use App\Models\Social;
use App\Models\User;

function getSocials() {
    return Social::all();
}

function checkBalance() {
    return BalanceMessage::where('status', 'consideration')->count() > 0;
}

function checkMessage() {
    $users = User::all();
    $ids = [];
    foreach ($users as $user) {
        $mes = Message::where('user_id', $user->id)->where('whom', 'support')->latest()->first();
        if ($mes and $mes->status != 'read') {
            $ids[] = $user->id;
        };
    }
    return count($ids) > 0;
}

function checkOrder() {

    return Order::whereNot('status', 'delivered')->count() > 0;
}

function checkReview() {
    return $reviews = ProductReview::where('status', 'new')->count() > 0;
}

function banner() {
    return Banner::first();
}
