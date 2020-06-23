<?php

namespace doctype_admin\Settings\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DoctypeAdminSettingInstallerCommand extends Command
{
    protected $signature = "DoctypeAdminSetting:install {--c|config : Installs only config file} {--f|view : Installs only view files} {--m|migration : Installs only migration files} {--d|dummy : Installs only seed files} {--a|all : Installs all publishable files}";

    public $description = "This Command installs Doctype Admin Setting Package to your Admin Panel";

    public function handle()
    {
        if (!empty($this->options())) {
            if ($this->option('config')) {
                $this->call('vendor:publish', [
                    '--tag' => ['setting-config']
                ]);
            }
            if ($this->option('view')) {
                $this->call('vendor:publish', [
                    '--tag' => ['setting-views']
                ]);
            }
            if ($this->option('migration')) {
                $this->call('vendor:publish', [
                    '--tag' => ['setting-migrations']
                ]);
            }
            if ($this->option('dummy')) {
                $this->call('vendor:publish', [
                    '--tag' => ['setting-seeds']
                ]);

                Artisan::call('db:seed', [
                    '--class' => 'SettingsTableSeeder'
                ]);
            }
            if ($this->option('all')) {
                $this->call('vendor:publish', [
                    '--tag' => ['setting-config']
                ]);
                $this->call('vendor:publish', [
                    '--tag' => ['setting-views']
                ]);
                $this->call('vendor:publish', [
                    '--tag' => ['setting-migrations']
                ]);
                $this->call('vendor:publish', [
                    '--tag' => ['setting-seeds']
                ]);
                $this->info("Doctype Admin setting Installed");
            }
        } else {
            $this->error("Please provide option to DoctypeAdminsetting:install command");
            $this->info("Please see the command structure");
            $this->info("php artisan help DoctypeAdminsetting:install");
        }
    }
}
