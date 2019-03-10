<?php


namespace App\Repositories;


use App\Models\Banner;
use App\Models\Venue;
use Illuminate\Support\Facades\DB;

class BannerRepository
{
    public function getBanerList()
    {
        return Banner::select([
            'id', 'name', 'picture_uri', 'uri'
        ])
            ->get()
            ->toArray();
    }

}