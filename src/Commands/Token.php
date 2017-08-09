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
        $key = bin2hex( openssl_random_pseudo_bytes(18) );

        file_put_contents( $this->laravel->environmentFilePath(), preg_replace(
            $this->keyReplacementPattern(),
            'API_TOKEN='.$key,
            file_get_contents($this->laravel->environmentFilePath())
        ));

        $this->info("API token [$key] set successfully.");
    }

    /**
     * Get a regex pattern that will match env APP_KEY with any random key.
     *
     * @return string
     */
    protected function keyReplacementPattern()
    {
        $escaped = preg_quote('='.env('API_TOKEN'), '/');

        return "/^API_TOKEN{$escaped}/m";
    }
}