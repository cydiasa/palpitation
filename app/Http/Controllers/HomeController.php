<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\CaffeineIntake;


/**
 * I will use a mix of Eloquent (to save time and get this done tonight) and regular DB to show you I can make plain sql query
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Variable declaration
        $todayTotalCaffeine  = 0;
        $todayNumberOfDrinks = 0;

        // Get auth instance of current user
        $user = Auth::user();
        // Get todays date
        $todayTimeSpan = Carbon::today();
        // Query for the current users intake
        $caffeineIntake = CaffeineIntake::where('user_id', $user->id)
                                        ->whereDate('created_at', $todayTimeSpan)
                                        ->orderBy('id', 'DESC')
                                        ->get();

        // Create query to find top drinks for today for the user
        $topFiveDrinks  = DB::select(
                                       'SELECT DISTINCTROW
                                                `caffeine_sources`.`name`, SUM(`caffeine_intakes`.`units`) as "total"
                                        FROM
                                                `caffeine_intakes`
                                        LEFT JOIN
                                                `caffeine_sources` ON `caffeine_sources`.`id` = `caffeine_intakes`.`caffeine_source_id`
                                        WHERE
                                                `caffeine_intakes`.`user_id` = ?
                                            AND
                                                `caffeine_intakes`.`created_at` > ?
                                        GROUP BY
                                                `caffeine_sources`.`name`
                                        ORDER BY
                                                total
                                        DESC',
                                        [
                                            $user->id,
                                            $todayTimeSpan
                                        ]
                                    );

        // calculate some basic info for dashboard
        foreach ($caffeineIntake as $key => $value) {
            $todayTotalCaffeine += $value->units * $value->caffeineSources[0]->value;
            $todayNumberOfDrinks += $value->units;
        }

        // Return information for dashboard
        return view(
                'home',
                [
                    "user" => $user,
                    "caffeineIntake" => $caffeineIntake,
                    "todayTotalCaffeine" => $todayTotalCaffeine,
                    "todayTotalCaffeinePercentage" => (($todayTotalCaffeine/500)*100),
                    "todayNumberOfDrinks" => $todayNumberOfDrinks,
                    "topFiveDrinks" => $topFiveDrinks
                ]);
    }
}
