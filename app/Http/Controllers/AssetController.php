<?php

namespace App\Http\Controllers;

use Less_Parser;
use Illuminate\Http\Request;

class AssetController extends Controller
{
	protected $colors = [
	   'primary' => '336699',
	   'success' => '339966',
	   'info' => '663399',
	   'warning' => '669933',
	   'danger' => '996633'
	];

	public function getCss2($less_file)
	{
	    $file_path = base_path().'/resources/assets/less';
	    $file_name = $file_path.'/'.$less_file.'.less';
	    $parser = new Less_Parser();
	    $parser->parseFile($file_name);
	    $compiled_css = $parser->getCss();

	    return response($compiled_css)->header('Content-Type', 'text/css');
	}

	public function getCss()
	{
		//echo "foo";
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
}
