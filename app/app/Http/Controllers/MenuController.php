<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::all();
        $queueCount = $this->getQueueCount();
        $waitingTime = $this->calculateWaitingTime($queueCount);

        return view('menu.index', compact('menuItems', 'queueCount', 'waitingTime'));
    }

    public function queueStatus()
    {
        $queueCount = $this->getQueueCount();
        $waitingTime = $this->calculateWaitingTime($queueCount);

        return response()->json([
            'queue_count' => $queueCount,
            'waiting_time' => $waitingTime,
        ]);
    }

    private function getQueueCount(): int
    {
        return Order::where('status', '!=', 'completed')->count();
    }

    private function calculateWaitingTime(int $queueCount): int
    {
        return $queueCount * 10;
    }
}
