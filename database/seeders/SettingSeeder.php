<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'address', 'value' => 'ismailia'],
            ['key' => 'phone', 'value' => '01095434347'],
            ['key' => 'email', 'value' => 'medical@example.com'],
            ['key' => 'Website Name', 'value' => 'Medical System'],
            ['key' => 'hero_title', 'value' => 'Welcome to Medical System'],
            ['key' => 'hero_description', 'value' => 'Welcome to Medical System - Home Page'],
            ['key' => 'why_question', 'value' => 'Why Choose Medical System?'],
            ['key' => 'why_answer', 'value' => 'Lorem ipsum dolor sit amet, consectetur adiis.'],
            ['key' => 'card_one_title', 'value' => 'Corporis voluptates sit'],
            ['key' => 'card_one_description', 'value' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatp'],
            ['key' => 'card_two_title', 'value' => 'Corporis voluptates sit'],
            ['key' => 'card_two_description', 'value' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi utliquip'],
            ['key' => 'card_three_title', 'value' => 'Corporis voluptates sit'],
            ['key' => 'card_three_description', 'value' => 'Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip'],
            ['key' => 'about_video', 'value' => 'https://youtu.be/4JLErNiQowQ'],
            ['key' => 'about_title', 'value' => 'Enim quis est voluptatibus aliquid consequatur fugiat'],
            ['key' => 'about_description', 'value' => 'Esse voluptas cumque vel exercitationem. Reiciendis est hic aoluptate'],
            ['key' => 'about_box-one_title', 'value' => 'Lorem Ipsum'],
            ['key' => 'about_box-one_description', 'value' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident'],
            ['key' => 'about_box-two_title', 'value' => 'Lorem Ipsum'],
            ['key' => 'about_box-two_description', 'value' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident'],
            ['key' => 'about_box-three_title', 'value' => 'Lorem Ipsum'],
            ['key' => 'about_box-three_description', 'value' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident'],
            ['key' => 'counter_one_title', 'value' => 'Doctors'],
            ['key' => 'counter_one_count', 'value' => '50'],
            ['key' => 'counter_two_title', 'value' => 'Doctors'],
            ['key' => 'counter_two_count', 'value' => '50'],
            ['key' => 'counter_three_title', 'value' => 'Doctors'],
            ['key' => 'counter_three_count', 'value' => '50'],
            ['key' => 'counter_four_title', 'value' => 'Doctors'],
            ['key' => 'counter_four_count', 'value' => '50'],
            ['key' => 'doctors_description', 'value' => 'Voluptatum deleniti atque corrupti quos doloresVoluptatum deleniti atque corrupti quos doloresVoluptatum deleniti atque corrupti quos dolores'],
            ['key' => 'department_description', 'value' => 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. ea. Quia fugiat sit in iste officiis commodi quidem hic quas.'],

        ];

        Setting::insert($settings);
    }
}
