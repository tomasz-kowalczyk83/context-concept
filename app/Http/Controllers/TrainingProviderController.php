<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company\Platforms\Video;
use App\Company\TrainingProvider;
use App\Company\Interfaces\CompanyInterface;
use Illuminate\Contracts\Queue\EntityResolver;

class TrainingProviderController extends Controller
{

    public function __construct()
    {
        echo "I'm called";
        dump($this);
    }

    public function theme($type, $id)
    {
        $apptype = 'App\\Company\\' . $type;
        $theapp = $apptype::find($id);

        if ($theapp->manageTheme())
        {
            return view('theme');
        }   else
        {
            abort(503);
        }
    }
    public function manage($id)
    {
        $type = 'TrainingProvider';
        $apptype = 'App\\Company\\' . $type;
        $theapp = $apptype::find($id);

        return view('manage', compact('theapp'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tps = TrainingProvider::all();

        return view('index', compact('tps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function showAll()
    {
        //
        $trainingproviders = TrainingProvider::all();

        dump($this, $trainingproviders );

        return view('showtrainingprovider', compact('trainingproviders'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $trainingprovider = TrainingProvider::find($id);

        dump($this, $trainingprovider );

        return view('trainingprovider', compact('trainingprovider'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
