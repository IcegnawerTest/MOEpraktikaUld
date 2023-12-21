<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Application;

class DeleteExpiredApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-expired-application';

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
        Application::where('expires_at', '<', now())->where('status', 'Принято'||'Отклонено')->delete();
    }
}
