<?php


namespace App\Services;

use App\OrderStatus;
use App\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OrderService
{
    public function getExpired(Builder $builder) {
        return $builder->where('delivery_dt', '<', Carbon::now())
            ->where('status', OrderStatus::APPROVED)
            ->orderBy('delivery_dt','desc')
            ->limit(50);
    }

    public function getCurrent(Builder $builder) {
        return $builder->where('delivery_dt', '>', Carbon::now())
            ->where('delivery_dt', '<=', Carbon::now()->addHours(24))
            ->where('status', OrderStatus::APPROVED)
            ->orderBy('delivery_dt');
    }

    public function getNew(Builder $builder) {
        return $builder->where('delivery_dt', '>', Carbon::now())
            ->where('status' , OrderStatus::NEW)
            ->orderBy('delivery_dt')
            ->limit(50);
    }

    public function getClosed(Builder $builder) {
        return $builder->where('delivery_dt', '>', Carbon::now()->startOfDay())
            ->where('delivery_dt', '<=', Carbon::now()->endOfDay())
            ->where('status', OrderStatus::CLOSED)
            ->orderBy('delivery_dt', 'desc')
            ->limit(50);
    }

}