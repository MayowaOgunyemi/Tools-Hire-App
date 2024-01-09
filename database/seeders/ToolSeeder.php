<?php

namespace Database\Seeders;

use App\Models\Tool;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $powerToolsCategory = Category::where('name', 'Power Tools')->first();
        $handToolsCategory = Category::where('name', 'Hand Tools')->first();
        $safetyEquipmentCategory = Category::where('name', 'Safety Equipment')->first();
        $user = User::where('role', 'admin')->first();

        Tool::create([
            'name' => 'Drill Machine',
            'description' => 'A tool fitted with a cutting tool attachment or driving tool attachment, usually a drill bit or driver bit.',
            'category_id' => $powerToolsCategory->id,
            'user_id' => $user->id,
            'cost' => 250,
        ]);

        Tool::create([
            'name' => 'Hammer',
            'description' => 'A tool consisting of a heavy metal head mounted at right angles at the end of a handle, used for jobs such as breaking things and driving in nails.',
            'category_id' => $handToolsCategory->id,
            'user_id' => $user->id,
            'cost' => 350,
        ]);

        Tool::create([
            'name' => 'Safety Helmet',
            'description' => 'A type of helmet predominantly used in workplace environments such as industrial or construction sites to protect the head from injury due to falling objects, impact with other objects, debris, rain, and electric shock.',
            'category_id' => $safetyEquipmentCategory->id,
            'user_id' => $user->id,
            'cost' => 225,
        ]);

        Tool::create([
            'name' => 'Circular Saw',
            'description' => 'A power-saw using a toothed or abrasive disc or blade to cut different materials using a rotary motion spinning around an arbor.',
            'category_id' => $powerToolsCategory->id,
            'user_id' => $user->id,
            'cost' => 331,
        ]);

    
    }
}
