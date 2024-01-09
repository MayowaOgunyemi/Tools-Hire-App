<?php

namespace Database\Seeders;

use App\Models\Tool;
use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $toolService = Tool::first();

        Review::create([
            'user_id' => $user->id,
            'tool_id' => $toolService->id,
            'rating' => 4,
            'performance_rating' => 4,
            'customer_service_rating' => 5,
            'support_rating' => 4,
            'after_sales_support_rating' => 3,
            'miscellaneous_rating' => 4,
            'comment' => 'Great tool, highly recommended!',
            'is_approved' => true,
        ]);
    }
}
