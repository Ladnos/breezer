<?php

namespace App\Console\Commands;
use App\Models\Admin;

use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {name} {login} {password} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создать админа';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $login = $this->argument('login');
        $password = $this->argument('password');
        $name = $this->argument('name');
        $admin = new Admin;
        $admin->name = $name;
        $admin->login = $login;
        $admin->password = \Illuminate\Support\Facades\Hash::make($password);
        $admin->save();
    }
}
