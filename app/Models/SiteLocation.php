<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class SiteLocation extends Model
{
    use CrudTrait;

    /*
   |--------------------------------------------------------------------------
   | GLOBAL VARIABLES
   |--------------------------------------------------------------------------
   */

    protected $table = 'site_locations';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['location', 'address', 'latitude', 'longitude', 'size'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
     * Calculates the distance between two SiteLocation objects
     * @param SiteLocation Object $location1
     * @param String $unit [meter | mile]
     */
    public function distanceFrom(SiteLocation $location1, $unit = 'meter')
    {
        switch ($unit) {
            case 'meter':
                $radius = 6371000;
                break;
            case 'mile':
                $radius = 3959;
                break;
            default:
                $radius = 6371000;
        }

        $results = $this->vincentyGreatCircleDistance($this->latitude, $this->longitude, $location1->latitude, $location1->longitude, $radius);
        //this will round the number to two decimal places only.
        return round((float)$results, 2);
    }

    public function distanceFrom2(SiteLocation $location1, $unit = 'km')
    {
        switch ($unit) {
            case 'km':
                $radius = 'Km';
                break;
            case 'mile':
                $radius = 'Mi';
                break;
            default:
                $radius = 'Mi';
        }

        $results = $this->getDistanceBetweenPointsNew($this->latitude, $this->longitude, $location1->latitude, $location1->longitude, $radius);
        //this will round the number to two decimal places only.
        return round((float)$results, 2);
    }

    /**
     * Calculates the great-circle distance between two points, with
     * the Vincenty formula.
     * @param float $latitudeFrom Latitude of start point in [deg decimal]
     * @param float $longitudeFrom Longitude of start point in [deg decimal]
     * @param float $latitudeTo Latitude of target point in [deg decimal]
     * @param float $longitudeTo Longitude of target point in [deg decimal]
     * @param float $earthRadius Mean earth radius in [m]
     * @return float Distance between points in [m] (same as earthRadius)
     */
    private function vincentyGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo   = deg2rad($latitudeTo);
        $lonTo   = deg2rad($longitudeTo);

        $lonDelta = $lonTo - $lonFrom;
        $a        = pow(cos($latTo) * sin($lonDelta), 2) +
            pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
        $b        = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

        $angle = atan2(sqrt($a), $b);
        return $angle * $earthRadius;
    }

    function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Mi')
    {
        $theta    = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;

        switch ($unit) {
            case 'Mi':
                break;
            case 'Km' :
                $distance = $distance * 1.609344;
        }
        return (round($distance, 2));
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Scope a query to get near locations.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $distance in KM
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNearBy($query, $distance = 10)
    {
        return $query->select(\DB::raw(' * FROM (SELECT *, (((acos(sin(('.$this->latitude.'*pi()/180)) * sin((`latitude`*pi()/180))+cos(('.$this->latitude.'*pi()/180)) *cos((`latitude`*pi()/180)) * cos((('.$this->longitude.'-`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance'))
            ->from(\DB::raw('`site_locations`)myTable '))
            ->where('distance', '<=', $distance);

    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
