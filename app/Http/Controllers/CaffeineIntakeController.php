<?php

namespace App\Http\Controllers;

use App\CaffeineIntake;
use App\CaffeineSources;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;


/**
 * I will use the Eloquent ORM for this controller to demonstrate that I know how to stay within Laravel
 */
class CaffeineIntakeController extends Controller
{

    /**
     * Validation rules used in this controller
     */
    protected $rules = [
        'caffeine_source_id' => 'required',
        'units' => 'required|min:0|max:99999'
    ];

    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Store userID to be reused if needed
        $userID = Auth::user()->id;

        // Get current date used for some filtered views
        $todayDate = Carbon::now();

        // Default return value of this function
        $returnView = view(
                            'controllers.caffeine-intake.index',
                            [
                                'caffeineIntake' => CaffeineIntake::where('user_id', $userID)
                                                                    ->orderBy('id', 'DESC')
                                                                    ->paginate(10)
                            ]
                        );

        /**
         * Switch
         * Switch based on time search and display requested results
         *
         * All queries return with pagination. Ts is a get variable referring to time search
         */
        switch($request->get('ts')){

            case 'today':
                $returnView =  view(
                                    'controllers.caffeine-intake.index',
                                    [
                                        'caffeineIntake' => CaffeineIntake::where('user_id', $userID)
                                                                            ->whereDate('created_at', $todayDate->today())
                                                                            ->orderBy('id', 'DESC')
                                                                            ->paginate(10)
                                    ]
                                );
                break;

            case 'week':
                $returnView =  view(
                                    'controllers.caffeine-intake.index',
                                    [
                                        'caffeineIntake' => CaffeineIntake::where('user_id', $userID)
                                                                            ->whereBetween('created_at', [$todayDate->subWeek(), $todayDate->now()])
                                                                            ->orderBy('id', 'DESC')
                                                                            ->paginate(10)
                                    ]
                                );
                break;

            case 'month':
                $returnView =  view(
                                    'controllers.caffeine-intake.index',
                                    [
                                        'caffeineIntake' => CaffeineIntake::where('user_id', $userID)
                                                                            ->whereBetween('created_at', [$todayDate->subMonth(), $todayDate->now()])
                                                                            ->orderBy('id', 'DESC')
                                                                            ->paginate(10)
                                    ]
                                );
                break;

            case 'year':
                $returnView =  view(
                                    'controllers.caffeine-intake.index',
                                    [
                                        'caffeineIntake' => CaffeineIntake::where('user_id', $userID)
                                                                            ->whereBetween('created_at', [$todayDate->subYear(), $todayDate->now()])
                                                                            ->orderBy('id', 'DESC')
                                                                            ->paginate(10)
                                    ]
                                );
                break;
        }

        return $returnView;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
                    'controllers.caffeine-intake.create',
                    [
                        'caffeineSources' => CaffeineSources::all()
                    ]
                );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate
        $validator = Validator::make($request->all(), $this->rules);

        // Handle validation errors
        if ($validator->fails()) {
            return Redirect::to('dashboard/caffeine-intake/create')
                            ->withErrors($validator)
                            ->withInput($request->all());
        } else {
            // If no errors, append user ID
            $request->request->add(
                                    [
                                        'user_id' => Auth::user()->id
                                    ]
                                );

            // Create new resource based on model
            CaffeineIntake::create($request->all());

            // redirect
            Session::flash('status', 'Successfully created a new Caffeine Intake!');
            return Redirect::to('dashboard/caffeine-intake');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CaffeineIntake  $caffeineIntake
     * @return \Illuminate\Http\Response
     */
    public function show(CaffeineIntake $caffeineIntake)
    {
        return view(
                    'controllers.caffeine-intake.show',
                    [
                        'item' => $caffeineIntake
                    ]
                );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaffeineIntake  $caffeineIntake
     * @return \Illuminate\Http\Response
     */
    public function edit(CaffeineIntake $caffeineIntake)
    {
        return view(
                    'controllers.caffeine-intake.edit',
                    [
                        'item' => $caffeineIntake,
                        'caffeineSources' => CaffeineSources::all()
                    ]
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CaffeineIntake  $caffeineIntake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CaffeineIntake $caffeineIntake)
    {
        // validate
        $this->validate($request, $this->rules);

        // Append user id to request
        $request->request->add([
                                'user_id' => Auth::user()->id
                              ]);

        // Edit current item
        $caffeineIntake->fill($request->all())->save();

        // Rediect
        Session::flash('status', 'Caffeine Intake successfully updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CaffeineIntake  $caffeineIntake
     * @return \Illuminate\Http\Response
     */
    public function destroy(CaffeineIntake $caffeineIntake)
    {
        $caffeineIntake->delete();

        Session::flash('status', 'Caffeine Intake successfully deleted!');
        return view('controllers.caffeine-intake.destroy');
    }

    public function destroyAll()
    {
        Session::flash('status', 'All Caffeine Intake successfully deleted!');
        return view('controllers.caffeine-intake.index');
    }
}
