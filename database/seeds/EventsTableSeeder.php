<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'plan' => 'Event One',
            'slug' => 'event-one',
            'description' => 'Description One',
            'location' => 'Makassar',
            'start_date' => '2021-03-02',
            'end_date' => '2021-03-05',
        ]);
    }
}
