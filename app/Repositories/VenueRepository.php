<?php


namespace App\Repositories;


use App\Models\Venue;
use Illuminate\Support\Facades\DB;

class VenueRepository
{
    public function getVenueList($city = '')
    {
        if ($city == '') {
            return Venue::select([
                'id', 'name', 'district', 'description', 'province', 'city', 'street', 'score', 'price', 'total_counts', 'free_counts',
                'start_at', 'end_at'
            ])
                ->where('status', 1)
                ->paginate(10)
                ->toArray();
        } else {
            return Venue::select([
                'id', 'name', 'district', 'description', 'province', 'city', 'street', 'score', 'price', 'total_counts', 'free_counts',
                'start_at', 'end_at'
            ])
                ->Where('city', $city)
                ->where('status', 1)
                ->paginate(10)
                ->toArray();
        }

    }

    /**
     * 筛选
     * @param $filterType
     * @param $filterValue
     * @return mixed
     */
    public function filterVenue($filterType, $filterValue)
    {
        return Venue::select([
            'id', 'name', 'district', 'description', 'province', 'city', 'thumb', 'street', 'score', 'price', 'total_counts', 'free_counts',
            'start_at', 'end_at'
        ])
            ->where('status', 1)
            ->where($filterType, $filterValue)
            ->paginate(10)
            ->toArray();
    }

    public function searchVenue($keywords)
    {
        return Venue::select([
            'id', 'name', 'district', 'description', 'province', 'city', 'thumb', 'street', 'score', 'price', 'total_counts', 'free_counts',
            'start_at', 'end_at'
        ])
            ->where('status', 1)
            ->where('name', 'LIKE', '%' . $keywords . '%')
            ->paginate(10)
            ->toArray();
    }

}