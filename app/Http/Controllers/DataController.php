<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;

class DataController extends Controller
{

    function getCities($region_id){


	    $cities = City::where('region_id', $region_id)->get();
	    echo "<option value=''>Tumanni tanlang...</option>";
	    
	    foreach ($cities as $city) {
	        echo "<option value=" . $city->id . " >" . $city->name_uz . "</option>";
	    }
	}
}
