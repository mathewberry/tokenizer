<?php

namespace Mathewberry\Tokenizer\Commands;

use Illuminate\Console\Command;

class Token extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a one time token';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line( 'Place this token in your .env [API_TOKEN] key' );
        $this->line( bin2hex( openssl_random_pseudo_bytes(22 ) ) );
    }
}