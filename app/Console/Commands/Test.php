<?php

namespace App\Console\Commands;

use App\Models\Version;
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
    public function handle(Version $version)
    {
        $str = 'com.dominigames.bruh.cc12.blah.fremium';
        if (stripos($str,'free2play') || stripos($str,'f2p')){
            $gameVersion = 'free';
        }else $gameVersion = 'prem';

        $str = explode('com.dominigames.',$str);
        dd(explode('.',$str[1]));
        $tech_name = $str;
    }
}

