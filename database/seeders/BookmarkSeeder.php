<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Bookmark;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            $userIds = [1, 2, 3];

            for ($i = 0; $i < 100; $i++) {
                $userIndex = array_rand($userIds); // Get a random user index
                $userId = $userIds[$userIndex];
        
                $title = generateRandomString(); // Your function to generate a random string
                $url = 'http://' . $title . '.com'; // Creating a simple URL
        
                Bookmark::create([
                    'user_id' => $userId,
                    'title' => $title,
                    'url' => $url,
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
