<?php

namespace App\Http\Controllers;

use App\Company\Enterprise;
use Illuminate\Http\Request;
use App\Company\Platforms\Video;
use App\Company\TrainingProvider;
use App\Company\Interfaces\CompanyInterface;
use Illuminate\Contracts\Queue\EntityResolver;

class CompanyController extends Controller
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
    public function manage($type, $id)
    {
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
        $enterprises = Enterprise::all();
        $tps = TrainingProvider::all();

        return view('index', compact('enterprises','tps'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $enterprise = Enterprise::find($id);

        dump($this, $enterprise );

        return view('enterprise', compact('enterprise'));

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
