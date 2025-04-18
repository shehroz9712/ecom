<?php

namespace App\Repositories;

use App\Models\Package;
use App\Models\PackageSubscribe;
use App\Models\UserDetails;
use App\Repositories\Interfaces\PackageSubscribeRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PackageSubscribeRepository implements PackageSubscribeRepositoryInterface
{

    public function findById($id)
    {
        return Package::find($id);
    }

    public function subscribeToPackage($packageId,$paymentMethodId)
    {
        $package = Package::find($packageId);

        $userDetail = UserDetails::firstOrCreate(['user_id' => Auth::user()->id]);
        $userDetail->package_id = $package->id; 
        $userDetail->coins = $package->coins ?? 0;
        $userDetail->max_resume_templates = $package->resume_templates ?? 0;
        $userDetail->max_cover_templates = $package->cover_templates ?? 0;
        $userDetail->max_services = $package->max_services ?? 0;
        $userDetail->used_resume_templates = 0;
        $userDetail->used_cover_templates = 0;
        $userDetail->used_services = 0;
        $userDetail->max_spell_grammar_tries = $package->spell_and_grammar_tries ?? 5;
        $userDetail->used_spell_grammar_tries = 0;
        $userDetail->max_resume_parser_tries = $package->resume_parser_tries ?? 5;
        $userDetail->used_resume_parser_tries =0;
        $userDetail->max_ai_cover_letter_tries = 0;
        $userDetail->payment_method_id = $paymentMethodId;
        $userDetail->used_ai_cover_letter_tries = $package->ai_based_cover_letter_tries ?? 0;
        $userDetail->start_date = now();
        $userDetail->end_date = Carbon::now()->addDays($package->duration);
        $userDetail->save();

        $userDetail->load('package');
        return $userDetail;
    }

    public function updateUsage($type,$value)
    {
        $userDetail = UserDetails::firstOrCreate(['user_id' => Auth::user()->id]);
        if ($userDetail->hasAttribute($type)) {

            $maxField = 'max_' . substr($type, 5);

            $currentUsedValue = $userDetail->$type ?? 0;

            $newValue = ($currentUsedValue + ($value ?? 1));

            if ($newValue <= $userDetail->$maxField) {
                $userDetail->$type = $newValue;
            } elseif ($userDetail->$maxField !== 0) {
                return ['message' => 'limit_reached', 'status' => true];
            } elseif ($userDetail->$maxField == 0) {
                return ['message' => 'limit_reached', 'status' => false];
            }
        }
        $userDetail->save();


        $userDetail->load('package');
        return $userDetail;
    }

    public function userDetails()
    {
        $userDetail = UserDetails::firstOrCreate(['user_id' => Auth::user()->id]);
        $userDetail->save();
        $userDetail->load('package');
        return $userDetail;
    }

    
}
