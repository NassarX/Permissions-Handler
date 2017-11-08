<?php

namespace PermissionsHandler\Commands;

use PermissionsHandler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PermissionsHandler\Models\Role;
use PermissionsHandler\Models\Permission;

class AddPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:add-permission {--permission=} {--role=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new permission to the system database';


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
     * @return mixed
     */
    public function handle()
    {
        $permission = $this->option('permission');
        $role = $this->option('role');
        if(!$permission || !$role){
            $this->error('permission and role is required');
            return;
        }
        $this->line("Creating permission `$permission` for role `$role`");
        PermissionsHandler::assignPermissionToRole($permission, $role);
        $this->info('permission has been created!');

    }
}

?>