<?php

namespace App\Console\Commands;

use App\Models\Books;
use Illuminate\Console\Command;

class CreateBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-book';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new book';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = $this->ask('Enter the title of the book:');
        $price = $this->ask('Enter the price of the book:');
        $status = $this->choice('Select the status of the book:', ['available', 'unavailable']);
        $author_id = $this->ask('Enter the ID of the author:');
        $publisher_id = $this->ask('Enter the ID of the publisher:');
        $book = Books::create([
            'title' => $title,
            'price' => $price,
            'status' => $status,
            'author_id' => $author_id,
            'publisher_id' => $publisher_id,
        ]);
        $this->info('Book created successfully!');
    }
}
