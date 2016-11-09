<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\BusinessType;
use App\Models\AdFormat;
use App\Models\State;
use App\Models\Town;
use App\Models\SiteLocation;
use App\Models\Entry;

class ImportDataController extends Controller
{
    public function import()
    {

        \Excel::load('public/files/excel/SUNWAY GROUP-OOH-SUMMARY10.xlsx', function ($reader) {

            // reader methods
            // Getting all results
            $results = $reader->get();
//            dd($results);
            $results = $reader->toArray();
            foreach ($results[0] AS $k => $v) {
                echo '"' . $k . '", ';
                if ($k == "in_charge") {
//                    print_r($v);
//                    var_dump($v);
                }
            }
//            die();
//            dd($results);
            foreach ($results as $row) {
                //in charge
                if($row['in_charge'] != '-' && $row['in_charge']){
                    $incharge = Carbon::createFromFormat('d/m/Y H:i:s', preg_replace('/\s+/', '', $row['in_charge']).' 00:00:00', 'Asia/Kuala_Lumpur');
                    $in_charge      = $incharge->toDateString();
                } else{
                    $in_charge = NULL;
                }
                //                echo 'excel: ' . $row['in_charge'] . ' new: ' . $in_charge . '<br >' . PHP_EOL;
                // ./ incharge

                //outcharge

                if($row['out_charge'] != '-' && $row['out_charge']){
                    $outcharge = Carbon::createFromFormat('d/m/Y H:i:s', preg_replace('/\s+/', '', $row['out_charge']).' 00:00:00', 'Asia/Kuala_Lumpur');
                    $out_charge      = $outcharge->toDateString();
                } else{
                    $out_charge = NULL;
                }
                //                echo 'excel: ' . $row['out_charge'] . ' new: ' . $out_charge . '<br >' . PHP_EOL;
                // ./outcharge

                //duration
                $duration = $incharge->diffInDays($outcharge);
                // ./duration

                //expiry
                $expiry = Carbon::now()->diffInDays($outcharge);
                // ./expiry


                //BU
                $bu = BusinessType::firstOrCreate(['type' => $row['bu']]);
                // ./BU

                //adformat
                $ad_format = AdFormat::firstOrCreate(['format' => $row['format']]);
                // ./adformat

                //state
                $state = State::firstOrCreate(['state' => $row['state']]);
                // ./state

                //town
                $town = Town::firstOrCreate(['state_id' => $state->id, 'town' => $row['town']]);
                // ./town

                //site location
                $site_location = SiteLocation::firstOrCreate(['location' => $row['site_location'], 'size'=> $row['size_h_x_w_ft']]);
                // ./site location

                //entry
                $entry = Entry::create(['company_id' => 1, 'business_type_id' => $bu->id, 'signed_by' => $row['contract_signed_by'], 'visual' => $row['visual'], 'mo' => $row['mo'], 'renew_by' => $row['renew_by'], 'ad_format_id' => $ad_format->id, 'state_id' => $state->id, 'town_id' => $town->id, 'site_location_id' => $site_location->id, 'in_charge' => $in_charge, 'out_charge' => $out_charge, 'duration' => $duration, 'expiry' => $expiry, 'rental' => $row['rental_rm'], 'lighting' => $row['lighting_rm'], 'production' => $row['production_rm'], 'remarks' => $row['re03ks']]);
                echo 'Entry ID: '.$entry->id.' INSERTED<br >'.PHP_EOL;
                // ./entry

            }

        });
    }
}
