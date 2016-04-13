<?php

namespace App\Http\Controllers;

use App\Competition;
use App\Http\Requests;
use App\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();
        $sports->load('competitions');
        return view('home')->withSports($sports);
    }

    /**
     * Get Competitions by sport id.
     *
     * @param $sport_id
     * @return mixed
     */
    public function getCompetitions($sport_id)
    {
        $sport = Sport::find($sport_id);
        $sport->load('competitions');

        return view('competitions')->withSport($sport);
    }


    /**
     * Get Games by competition id.
     *
     * @param $competition_id
     * @return mixed
     */
    public function getGames($competition_id)
    {
        $competition = Competition::find($competition_id);
        $competition->load('games');

        return view('games')->withCompetition($competition);
    }
}
