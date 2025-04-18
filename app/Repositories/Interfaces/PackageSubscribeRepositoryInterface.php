<?php

namespace App\Repositories\Interfaces;

interface PackageSubscribeRepositoryInterface
{
   
    public function findById($id);
    public function subscribeToPackage($packageId,$paymentMethodId);
    public function updateUsage($type,$value);
    public function userDetails();
    
}
