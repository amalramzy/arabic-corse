<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * php artisan create:admin
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin = new Admin();
        $admin->name = $this->ask('What is your name?');
        $admin->email = $this->ask('What is your email?');
        $admin->password =Hash::make($this->ask('What is the password?'));
        if ($this->confirm('Do you wish to continue?', true)) {
            $admin->save();
        }

    }
}
