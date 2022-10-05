<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'title' => 'user_management_access',
            ],
            [
                'id' => 2,
                'title' => 'permission_create',
            ],
            [
                'id' => 3,
                'title' => 'permission_edit',
            ],
            [
                'id' => 4,
                'title' => 'permission_show',
            ],
            [
                'id' => 5,
                'title' => 'permission_delete',
            ],
            [
                'id' => 6,
                'title' => 'permission_access',
            ],
            [
                'id' => 7,
                'title' => 'role_create',
            ],
            [
                'id' => 8,
                'title' => 'role_edit',
            ],
            [
                'id' => 9,
                'title' => 'role_show',
            ],
            [
                'id' => 10,
                'title' => 'role_delete',
            ],
            [
                'id' => 11,
                'title' => 'role_access',
            ],
            [
                'id' => 12,
                'title' => 'user_create',
            ],
            [
                'id' => 13,
                'title' => 'user_edit',
            ],
            [
                'id' => 14,
                'title' => 'user_show',
            ],
            [
                'id' => 15,
                'title' => 'user_delete',
            ],
            [
                'id' => 16,
                'title' => 'user_access',
            ],
            [
                'id' => 17,
                'title' => 'category_create',
            ],
            [
                'id' => 18,
                'title' => 'category_edit',
            ],
            [
                'id' => 19,
                'title' => 'category_show',
            ],
            [
                'id' => 20,
                'title' => 'category_delete',
            ],
            [
                'id' => 21,
                'title' => 'category_access',
            ],
            [
                'id' => 22,
                'title' => 'product_create',
            ],
            [
                'id' => 23,
                'title' => 'product_edit',
            ],
            [
                'id' => 24,
                'title' => 'product_show',
            ],
            [
                'id' => 25,
                'title' => 'product_delete',
            ],
            [
                'id' => 26,
                'title' => 'product_access',
            ],
            [
                'id' => 27,
                'title' => 'payment_method_create',
            ],
            [
                'id' => 28,
                'title' => 'payment_method_edit',
            ],
            [
                'id' => 29,
                'title' => 'payment_method_show',
            ],
            [
                'id' => 30,
                'title' => 'payment_method_delete',
            ],
            [
                'id' => 31,
                'title' => 'payment_method_access',
            ],
            [
                'id' => 32,
                'title' => 'shipping_type_create',
            ],
            [
                'id' => 33,
                'title' => 'shipping_type_edit',
            ],
            [
                'id' => 34,
                'title' => 'shipping_type_show',
            ],
            [
                'id' => 35,
                'title' => 'shipping_type_delete',
            ],
            [
                'id' => 36,
                'title' => 'shipping_type_access',
            ],
            [
                'id' => 37,
                'title' => 'setting_create',
            ],
            [
                'id' => 38,
                'title' => 'setting_edit',
            ],
            [
                'id' => 39,
                'title' => 'setting_show',
            ],
            [
                'id' => 40,
                'title' => 'setting_delete',
            ],
            [
                'id' => 41,
                'title' => 'setting_access',
            ],
            [
                'id' => 42,
                'title' => 'message_create',
            ],
            [
                'id' => 43,
                'title' => 'message_edit',
            ],
            [
                'id' => 44,
                'title' => 'message_show',
            ],
            [
                'id' => 45,
                'title' => 'message_delete',
            ],
            [
                'id' => 46,
                'title' => 'message_access',
            ],
            [
                'id' => 47,
                'title' => 'order_edit',
            ],
            [
                'id' => 48,
                'title' => 'order_access',
            ],
            [
                'id' => 49,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
