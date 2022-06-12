<?php

namespace App\Http\Controllers;


use App\Models\Leagues;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaguesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->get('start_timestamp')) {
            $leaguesIds = Leagues::query()->select('league_id')->where('start_timestamp', '>=', Carbon::createFromTimestamp($request->start_timestamp))->get();
        } else {
            $leaguesIds = Leagues::query()->select('league_id')->get();
        }

        if ($leaguesIds) {
            return json_encode($leaguesIds);
        }

    }

    public function show(Request $request)
    {
        $league = Leagues::query()->select('name')->where('league_id', $request->league_id)->get()->first();
        if ($league) {
            return json_encode($league);
        }
    }
}
