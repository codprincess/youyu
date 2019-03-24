<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19-3-9
 * Time: 下午10:28
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Venue;
use App\Repositories\VenueRepository;
use Illuminate\Http\Request;

class VenueTimeController extends Controller
{
    public function store(Venue $venue)
    {
        dd($venue);
    }

    public function update(Request $request, Venue $venue)
    {
        dd($venue);
    }
}