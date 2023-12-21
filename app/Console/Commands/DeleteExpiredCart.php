<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cart;

class DeleteExpiredCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-expired-cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Cart::where('expires_at', '<', now())->delete();
    }
}
