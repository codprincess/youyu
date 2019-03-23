<?php


namespace App\Repositories;


use App\Models\Banner;

class BannerRepository
{
    public function getBanerList()
    {
        return Banner::select([
            'id', 'name', 'picture_uri', 'redirect_uri'
        ])
            ->orderBy('weight','ASC')
            ->get()
            ->toArray();
    }

}