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
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'star_create',
            ],
            [
                'id'    => 18,
                'title' => 'star_edit',
            ],
            [
                'id'    => 19,
                'title' => 'star_show',
            ],
            [
                'id'    => 20,
                'title' => 'star_delete',
            ],
            [
                'id'    => 21,
                'title' => 'star_access',
            ],
            [
                'id'    => 22,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 24,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 26,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 29,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 30,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 31,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 32,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 33,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 34,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 35,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 36,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 37,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 38,
                'title' => 'number_create',
            ],
            [
                'id'    => 39,
                'title' => 'number_edit',
            ],
            [
                'id'    => 40,
                'title' => 'number_show',
            ],
            [
                'id'    => 41,
                'title' => 'number_delete',
            ],
            [
                'id'    => 42,
                'title' => 'number_access',
            ],
            [
                'id'    => 43,
                'title' => 'category_create',
            ],
            [
                'id'    => 44,
                'title' => 'category_edit',
            ],
            [
                'id'    => 45,
                'title' => 'category_show',
            ],
            [
                'id'    => 46,
                'title' => 'category_delete',
            ],
            [
                'id'    => 47,
                'title' => 'category_access',
            ],
            [
                'id'    => 48,
                'title' => 'entity_create',
            ],
            [
                'id'    => 49,
                'title' => 'entity_edit',
            ],
            [
                'id'    => 50,
                'title' => 'entity_show',
            ],
            [
                'id'    => 51,
                'title' => 'entity_delete',
            ],
            [
                'id'    => 52,
                'title' => 'entity_access',
            ],
            [
                'id'    => 53,
                'title' => 'star_play_create',
            ],
            [
                'id'    => 54,
                'title' => 'star_play_edit',
            ],
            [
                'id'    => 55,
                'title' => 'star_play_show',
            ],
            [
                'id'    => 56,
                'title' => 'star_play_delete',
            ],
            [
                'id'    => 57,
                'title' => 'star_play_access',
            ],
            [
                'id'    => 58,
                'title' => 'number_play_create',
            ],
            [
                'id'    => 59,
                'title' => 'number_play_edit',
            ],
            [
                'id'    => 60,
                'title' => 'number_play_show',
            ],
            [
                'id'    => 61,
                'title' => 'number_play_delete',
            ],
            [
                'id'    => 62,
                'title' => 'number_play_access',
            ],
            [
                'id'    => 63,
                'title' => 'star_menu_access',
            ],
            [
                'id'    => 64,
                'title' => 'menu_number_access',
            ],
            [
                'id'    => 65,
                'title' => 'menu_entity_access',
            ],
            [
                'id'    => 66,
                'title' => 'play_create',
            ],
            [
                'id'    => 67,
                'title' => 'play_edit',
            ],
            [
                'id'    => 68,
                'title' => 'play_show',
            ],
            [
                'id'    => 69,
                'title' => 'play_delete',
            ],
            [
                'id'    => 70,
                'title' => 'play_access',
            ],
            [
                'id'    => 71,
                'title' => 'award_create',
            ],
            [
                'id'    => 72,
                'title' => 'award_edit',
            ],
            [
                'id'    => 73,
                'title' => 'award_show',
            ],
            [
                'id'    => 74,
                'title' => 'award_delete',
            ],
            [
                'id'    => 75,
                'title' => 'award_access',
            ],
            [
                'id'    => 76,
                'title' => 'benefactor_create',
            ],
            [
                'id'    => 77,
                'title' => 'benefactor_edit',
            ],
            [
                'id'    => 78,
                'title' => 'benefactor_show',
            ],
            [
                'id'    => 79,
                'title' => 'benefactor_delete',
            ],
            [
                'id'    => 80,
                'title' => 'benefactor_access',
            ],
            [
                'id'    => 81,
                'title' => 'sub_category_create',
            ],
            [
                'id'    => 82,
                'title' => 'sub_category_edit',
            ],
            [
                'id'    => 83,
                'title' => 'sub_category_show',
            ],
            [
                'id'    => 84,
                'title' => 'sub_category_delete',
            ],
            [
                'id'    => 85,
                'title' => 'sub_category_access',
            ],
            [
                'id'    => 86,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
