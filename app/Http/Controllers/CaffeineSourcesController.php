<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\CaffeineSources;
use Illuminate\Http\Request;


class CaffeineSourcesController extends Controller
{

    /**
     * Validation rules
     */
    protected $rules = [
        'name' => 'required|min:3|max:255',
        'description' => 'required|min:3|max:3000',
        'value' => 'required|int|max:99999'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
                    'controllers.caffeine-sources.index',
                    [
                        'caffeineSources' => CaffeineSources::orderBy('id', 'DESC')
                                                            ->paginate(10)
                    ]
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('controllers.caffeine-sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return Redirect::to('dashboard/caffeine-sources/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {

            CaffeineSources::create($request->all());

            // redirect
            Session::flash('status', 'Successfully created a new Caffeine Source!');
            return Redirect::to('dashboard/caffeine-sources');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CaffeineSources  $caffeineSources
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view(
                    'controllers.caffeine-sources.show',
                    [
                        'item' => CaffeineSources::findOrFail($id)
                    ]
                );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CaffeineSources  $caffeineSources
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(
                    'controllers.caffeine-sources.edit',
                    [
                        'item' => CaffeineSources::findOrFail($id)
                    ]
                );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CaffeineSources  $caffeineSources
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $caffeineSource = CaffeineSources::findOrFail($id);

        $this->validate($request, $this->rules);

        $caffeineSource->fill($request->all())->save();
        Session::flash('status', 'Caffeine Source successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CaffeineSources  $caffeineSources
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caffeineSource = CaffeineSources::findOrFail($id);
        $caffeineSource->delete();
        Session::flash('status', 'Caffeine source successfully deleted!');
        return view('controllers.caffeine-sources.destroy');
    }
}
