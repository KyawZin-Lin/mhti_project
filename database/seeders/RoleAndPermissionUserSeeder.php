<?php

namespace Database\Seeders;

use App\Models\Admins\StudentLimit;
use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',

            'dashboard-page',

            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'enrollment-list',
            'student-enrollment-detail',
            'student-detail',
            'student-absent-list',

            'course-list',
            'course-create',
            'course-edit',
            'course-delete',
            'course-detail',
            'course-grid-view',

            'academic-year-list',
            'academic-year-create',
            'academic-year-edit',
            'academic-year-delete',

            'batch-list',
            'batch-create',
            'batch-edit',
            'batch-delete',

            'room-list',
            'room-create',
            'room-edit',
            'room-delete',

            'voucher-list',
            'voucher',

            'course-fee-list',
            'course-fee-create',
            'course-fee-edit',
            'course-fee-delete',

            'payment-type-list',
            'payment-type-create',
            'payment-type-edit',
            'payment-type-delete',


            'teacher-list',
            'teacher-create',
            'teacher-edit',
            'teacher-delete',
            'teacher-enrollment-detail',
            'teacher-detail',

            'teacher-attendance-list',
            'teacher-attendance-create',
            'teacher-attendance-edit',
            'teacher-attendance-delete',

            'teacher-leave-list',
            'teacher-leave-create',
            'teacher-leave-edit',
            'teacher-leave-delete',

            'staff-list',
            'staff-create',
            'staff-edit',
            'staff-delete',
            'staff-detail',

            'staff-leave-list',
            'staff-leave-create',
            'staff-leave-edit',
            'staff-leave-delete',


            'income-list',
            'income-create',
            'income-edit',
            'income-delete',
            'income-export',

            'income-source-list',
            'income-source-create',
            'income-source-edit',
            'income-source-delete',

            'expend-list',
            'expend-create',
            'expend-edit',
            'expend-delete',
            'expend-export',

            'job-list',
            'job-create',
            'job-edit',
            'job-delete',

            'log-history',

            'future-interest-list',
            'future-interest-create',
            'future-interest-edit',
            'future-interest-delete',

            'source-survey-list',
            'source-survey-create',
            'source-survey-edit',
            'source-survey-delete',

            'state-list',
            'state-create',
            'state-edit',
            'state-delete',

            'township-list',
            'township-create',
            'township-edit',
            'township-delete',

            'nrc-info-list',
            'nrc-info-create',
            'nrc-info-edit',
            'nrc-info-delete',

            'medical-status-list',
            'medical-status-create',
            'medical-status-edit',
            'medical-status-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=>'admin_user']);
        }

        // Verify that permissions were created
        $permissions = Permission::all();
        // Log::info('Permissions:', $permissions->toArray());

        $roleAdmin = Role::create(['name' =>'Admin','guard_name'=>'admin_user']);
        $roleSuperAdmin = Role::create(['name' =>'Superadmin','guard_name'=>'admin_user']);



        // Verify that the role was created


        $roleAdmin->givePermissionTo(Permission::all());
        $roleSuperAdmin->givePermissionTo(Permission::all());


        $adminUser = AdminUser::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => 1,
        ]);

        $studentLimit= StudentLimit::create([
            'limit_student' =>10,
            'admin_user_id' => $adminUser->id,
        ]);

        $adminUser->assignRole(['Admin']);


        $superAdminUser = AdminUser::create([
            'name' => 'MMcities',
            'email' => 'mmcities@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => 1,
        ]);


        $superAdminUser->assignRole(['Superadmin']);
    }
}
