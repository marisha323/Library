<?php

namespace App\Console\Commands;

use App\Models\Author;
use App\Models\Publication;
use Illuminate\Console\Command;

class AddAuthorPublisher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-author-publisher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new author or publisher';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->choice('What do you want to add?', ['author', 'publisher']);
        if ($type === 'author') {
            $name = $this->ask('Enter the name of the author:');
            Author::create(['name' => $name]);
            $this->info('Author added successfully!');
        } elseif ($type === 'publisher') {
            $name = $this->ask('Enter the name of the publisher:');
            $country = $this->ask('Enter the country of the publisher:');
            Publication::create(['name' => $name, 'country' => $country]);
            $this->info('Publisher added successfully!');
        }
    }
}
