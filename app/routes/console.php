<?php

use App\Models\Order;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('orders:complete-oldest', function () {
    $queueCount = Order::where('status', '!=', 'completed')->count();

    if ($queueCount > 5) {
        Log::warning('Kolejka zamowien przekroczyla limit.', [
            'queue_count' => $queueCount,
            'threshold' => 5,
        ]);
    }

    $order = Order::where('status', '!=', 'completed')
        ->orderBy('created_at')
        ->first();

    if (!$order) {
        $this->info('Brak aktywnych zamówień do zamknięcia.');
        return;
    }

    $order->status = 'completed';
    $order->save();

    Log::info('Zamowienie zostalo oznaczone jako completed.', [
        'order_id' => $order->id,
        'completed_at' => now()->toDateTimeString(),
    ]);

    $this->info("Zamówienie #{$order->id} oznaczone jako completed.");
})->purpose('Complete one oldest non-completed order');

Schedule::command('orders:complete-oldest')
    ->everyTenMinutes()
    ->withoutOverlapping();
