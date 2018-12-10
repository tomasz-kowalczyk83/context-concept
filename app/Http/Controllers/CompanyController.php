<?php

namespace App\Http\Controllers;

use Less_Parser;
use App\Company\Enterprise;
use Illuminate\Http\Request;
use App\Company\Platforms\Video;
use App\Company\TrainingProvider;
use App\Company\Interfaces\CompanyInterface;
use Illuminate\Contracts\Queue\EntityResolver;

class CompanyController extends Controller
{
	protected $colors = [
	   'primary' => '336699',
	   'success' => '339966',
	   'info' => '663399',
	   'warning' => '669933',
	   'danger' => '996633'
	];

    public function __construct()
    {

		//parent::__construct();

		$less_file = 'custom';

	    $file_path = base_path().'/resources/assets/less/skins';
	    $file_name = $file_path.'/'.$less_file.'.blade.php';
	    //$less_contents = view()->file($file_name)->render();
		$less_contents = view()->file($file_name, $this->colors)->render();

	    $parser = new Less_Parser();
	    $parser->SetImportDirs([
	        base_path() => base_path(),
	        $file_path => $file_path
	    ]);
	    $parser->parse($less_contents);
	    $compiled_css = $parser->getCss();

	    return response($compiled_css)->header('Content-Type', 'text/css');
    }

	public static function boot()
	{
		echo "boot";
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
