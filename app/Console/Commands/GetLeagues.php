<?php

namespace App\Console\Commands;

use App\Models\Leagues;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;


class GetLeagues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-leagues';

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
     * @return mixed
     */
    public function handle()
    {
        Leagues::query()->truncate();

        $clien = new Client();
        $response = $clien->get('https://www.dota2.com/webapi/IDOTA2League/GetLeagueInfoList/v001');
        $data = json_decode($response->getBody()->getContents(), true);
        $arrayOfLeagues = array_shift($data);

        foreach ($arrayOfLeagues as $league) {

            Leagues::query()->create([
                'league_id' => $league['league_id'],
                'name' => $league['name'],
                'tier' => $league['tier'],
                'region' => $league['region'],
                'most_recent_activity' => Carbon::parse($league['most_recent_activity']),
                'total_prize_pool' => $league['total_prize_pool'],
                'start_timestamp' => Carbon::parse($league['start_timestamp']),
                'end_timestamp' => Carbon::parse($league['end_timestamp']),
                'status' => $league['status'],
            ]);
        }
    }
}
