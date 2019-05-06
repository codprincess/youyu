<?php


namespace App\Repositories;


use App\Models\Venue;
use App\Models\VenuePlace;
use App\Models\VenueTime;

class VenueRepository
{
    public function createVenue($name)
    {

    }

    public function getVenueDetail(Venue $venue)
    {
        $dateList = VenueTime::select([
            'date'
        ])
            ->where('venue_id', $venue->id)
            ->orderBy('date', 'ASC')
            ->groupBy('date')
            ->get()
            ->toArray();
        foreach ($dateList as &$date) {
            $freeCount = VenueTime::where('venue_id', $venue->id)
                ->where('date', $date['date'])
                ->where('status', 1)
                ->count();
            $minPrice = VenueTime::where('venue_id', $venue->id)
                ->where('date', $date['date'])
                ->where('status', 1)
                ->orderBy('price', 'ASC')
                ->first('price');
            $date['freeCount'] = $freeCount;
            $date['minPrice'] = $minPrice['price'];
            $date['date'] = date('m月d日', strtotime($date['date']));
        }

        $data = [
            'venueInfo' => $venue,
            'dateList' => $dateList
        ];
        return $data;
    }

    /**
     * 场次信息（下单页面）
     * @param Venue $venue
     * @param string $pickDate
     * @return array
     */
    public function getVenueTimeList(Venue $venue, $pickDate = '')
    {
        $dateTimeList = [];
        $placeList = [];
        $dateList = VenueTime::select([
            'date'
        ])
            ->where('venue_id', $venue->id)
            ->orderBy('date', 'ASC')
            ->groupBy('date')
            ->get()
            ->toArray();

        $dateHourList = VenueTime::select('start_hour')->where('venue_id', $venue->id)
            ->where('date', $pickDate)
            ->groupBy('start_hour')
            ->get()
            ->toArray();

      //  dd($dateHourList);

        foreach ($dateHourList as $time) {
            $dateTimeList[$time['start_hour']] = VenueTime::where('venue_id', $venue->id)
                ->where('date', $pickDate)
                ->where('start_hour', $time['start_hour'])
                ->orderBy('place_id', 'ASC')
                ->get()
                ->toArray();
        }

        foreach ($dateList as &$date) {

            $freeCount = VenueTime::where('venue_id', $venue->id)
                ->where('date', $date['date'])
                ->where('status', 1)
                ->count();
            $date['freeCount'] = $freeCount;
            $date['date'] = date('m月d日', strtotime($date['date']));
        }
        $placeIdList = VenueTime::select([
            'place_id'
        ])
            ->where('venue_id', $venue->id)
            ->groupBy('place_id')
            ->get()
            ->toArray();
        foreach ($placeIdList as $placeId) {
            $place = VenuePlace::where('id', $placeId['place_id'])->first(['id', 'name']);
            $placeList[] = [
                'id' => $place['id'],
                'name' => $place['name']
            ];
        }
        $data = [
            'currentDate' => $pickDate,
            'dateList' => $dateList,
            'dateTimeList' => $dateTimeList,
            'placeList' => $placeList,
        ];
        return $data;
    }

    public function getVenueList($city = '')
    {
        if ($city == '') {
            return Venue::select([
                'id', 'name', 'district', 'description', 'province', 'city', 'street', 'score', 'cover_uri',
                'start_at', 'end_at'
            ])
                ->where('status', 1)
                ->paginate(10)
                ->toArray();
        } else {
            return Venue::select([
                'id', 'name', 'district', 'description', 'province', 'city', 'street', 'score', 'cover_uri',
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
            'id', 'name', 'district', 'description', 'province', 'city', 'thumb', 'street', 'score', 'cover_uri',
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
            'id', 'name', 'district', 'description', 'province', 'city', 'thumb', 'street', 'score', 'cover_uri',
            'start_at', 'end_at'
        ])
            ->where('status', 1)
            ->where('name', 'LIKE', '%' . $keywords . '%')
            ->paginate(10)
            ->toArray();
    }

}