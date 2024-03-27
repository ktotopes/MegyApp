<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Models\CeoInfo;
use App\Models\Contact;
use App\Models\Page;
use App\Models\Partner;
use App\Models\PopularQuestion;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return response()->json(new PageResource(Page::query()->first()), 200);
    }
}
