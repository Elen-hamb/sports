<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Sport;
use XmlParser;
use App\Competition;
use App\Game;

class ParserController extends Controller
{
    /**
     * Parse API data to database
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function parseData( Request $request)
    {
        $xml = XmlParser::load('http://affiliates.vbet.com/global/feed/xml/');
        $content = $xml->getContent();
        $sports = array();

        foreach($content as $sport_key => $sport)
        {
            $sport_id = ( string ) $sport->ID ;
            $sport_name = ( string ) $sport->Name;
            $sports[] = ['id'=> $sport_id, 'name' => $sport_name];
            $competitions = array();
            foreach($sport->Competitions->Competition as $comp_key => $competition)
            {
                $competition_id = ( string ) $competition->ID;
                $competition_name = ( string ) $competition->Name;
                $competitions[] = ['id'=>$competition_id, 'name'=> $competition_name, 'sport_id' => $sport_id];
                $count = count($competition->Games->ID);
                $games = array();
                for ($i = 0; $i< $count; $i++)
                {
                    $game_id = ( string ) $competition->Games->ID[$i];
                    $game_name = ( string )  $competition->Games->Name[$i];
                    $game_start = ( string )  $competition->Games->Start[$i];

                    $games[] = ['id' => $game_id, 'name'=> $game_name, 'start' => $game_start, 'competition_id' => $competition_id ];
                }
                Game::insert($games);

            }
            Competition::insert($competitions);
        }
        Sport::insert($sports);

        \Session::flash('status', 'Data successful uploaded!');
        return redirect('/home');
    }
}
