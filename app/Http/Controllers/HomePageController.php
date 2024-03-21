<?php

namespace App\Http\Controllers;

use App\Models\CeoInfo;
use App\Models\Contact;
use App\Models\HomePage;
use App\Models\Partners;
use App\Models\PopularQuestion;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function main()
    {
        return response()->json(HomePage::all());
    }

    public function contact()
    {
        return response()->json(Contact::all());
    }

    public function partner()
    {
        return response()->json(Partners::all());
    }

    public function popularQuestion()
    {
        return response()->json(PopularQuestion::all());
    }

    public function ceo()
    {
        return response()->json(CeoInfo::all());
    }

}
