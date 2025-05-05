<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $roles = ['employer', 'job_seeker', 'admin'];
        foreach ($roles as $role) {
            // Create roles if they don't exist
            Role::firstOrCreate(['name' => $role]);
        }
        $permissions = [
            'job_seeker dashboard',
            'employer dashboard',
            'browse jobs',
            'post job',
            'store job',
            'jobs show',
            'jobs apply',
            'jobs view',
            'jobs search',
            'applications feature',
            'applications latest',
            'applications create',
            'applications store',
            'applications index',
            'applications my',
            'about',
            'help',
            'contact form',
            'contact submit',
            'recommend me',
            'admin user roles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $job_seekerPermissions = [
            'job_seeker dashboard',
            'browse jobs',
            // 'post job',
            // 'store job',
            'jobs show',
            'jobs apply',
            'jobs view',
            'jobs search',
            'applications feature',
            'applications latest',
            'applications create',
            'applications store',
            'applications index',
            'applications my',
            // 'about',
            'help',
            'contact form',
            'contact submit',
            'recommend me',
            'admin user roles',
        
        ];
        Role::findByName('job_seeker')->givePermissionTo($job_seekerPermissions);
        

        $employerPermissions = [
            'employer dashboard',
            'browse jobs',
            'post job',
            'store job',
            'jobs show',
            'jobs view',
            'jobs search',
            'applications feature',
            'applications latest',
            'applications create',
            'applications store',
            'applications index',
            'applications my',
            'about',
            'help',
            'contact form',
            'contact submit',
            'recommend me',
            'admin user roles',
        ];
        Role::findByName('employer')->givePermissionTo($employerPermissions);

        // Admin Permissions (All permissions)
        Role::findByName('admin')->givePermissionTo(Permission::all());
    } 
}
