<?php
namespace Database\Seeders;
use App\Models\Event;
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
        //
        Event::create([
            'name' => 'Creating symbolic link between public and public_html',
            'description' => 'Run below command in root directory (ie. dir containing notes-app and public_html)
           ln -s notes-app/public public_html
           
           git add remote <remote-name (can be anything)> <remote url>
           then git pull ',
            'type' => 'event',
            'cost' => '50',
            'owner_id' => '1',
            'url' => 'https://www.w3schools.com/w3images/woods.jpg',
            'start_date' => '2020-02-02',
            'end_date' => '2020-02-03'
        ]);

        Event::create([
            'name' => 'Road Trip to BC',
            'description' => 'Join us for an epic roading experience.',
            'type' => 'event',
            'cost' => '20',
            'owner_id' => '1',
            'url' => 'https://www.w3schools.com/w3images/la.jpg',
            'start_date' => '2020-03-02',
            'end_date' => '2020-03-03'
        ]);

        Event::create([
            'name' => 'Volunteering at the Food Bank',
            'description' => 'Join us to help feed the poor and needy.',
            'type' => 'event',
            'cost' => '5',
            'owner_id' => '1',
            'url' => 'https://www.w3schools.com/w3images/coffeehouse.jpg',
            'start_date' => '2020-03-02',
            'end_date' => '2020-03-03'
        ]);

        Event::create([
            'name' => 'Trip to Elk Island',
            'description' => 'Join us at Elk Island National Park.',
            'type' => 'event',
            'cost' => '10',
            'owner_id' => '1',
            'url' => 'https://www.w3schools.com/w3images/woods.jpg',
            'start_date' => '2020-03-02',
            'end_date' => '2020-03-03'
        ]);
    }
}
