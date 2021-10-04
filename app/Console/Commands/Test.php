<?php

namespace App\Console\Commands;

use App\Models\Games;
use http\Env\Request;
use Illuminate\Console\Command;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $client = new Client([
            'header' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            'verify' => false,
            'http_errors'=> true
        ]);

//        $response = $client->get('https://laravel.com/87543');
        try {
            $client->request('GET', 'https://github.com/_abc_123_404');
        } catch (ClientException $e) {
            dd($e->getCode());
        }
    }
}

