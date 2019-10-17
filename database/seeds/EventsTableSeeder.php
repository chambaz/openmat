<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomUser = DB::table('users')->inRandomOrder()->first();

        DB::table('events')->insert([
            'user_id' => 1,
            'title' => 'This is a test event',
            'slug' => substr(sha1(time()), 0, 10).'-'.Str::slug('This is a test event'),
            'url' => 'http://www.roninbrazilianjiujitsu.com/',
            'description' => 'This is the description...',
            'school' => 'Ronin BJJ',
            'address' => '1175 State Street, New Haven, CT',
            'latitude' => 41.3159838,
            'longitude' => -72.90317329999999,
            'date' => '2019-12-1',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00'
        ]);

        DB::table('events')->insert([
            'user_id' => $randomUser->id,
            'title' => 'This is another test event',
            'slug' => substr(sha1(time()), 0, 10).'-'.Str::slug('This is another test event'),
            'url' => 'http://soulcraftbjj.com/',
            'description' => 'This is the description...',
            'school' => 'Soulcraft',
            'address' => 'Albany, NY',
            'latitude' => 42.652580,
            'longitude' => -73.756233,
            'date' => '2019-12-5',
            'start_time' => '09:00:00',
            'end_time' => '11:00:00'
        ]);

        factory(App\Event::class, 5)->create();
    }
}
