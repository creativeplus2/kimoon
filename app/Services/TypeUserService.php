<?php

namespace App\Services;

class TypeUserService
{

    private $PRICE_SELLER = 1000;
    private $PRICE_SUBDIS = 2000;
    private $PRICE_DISTRIBUTOR = 3000;

    public function getRegistrationPriceByUserType($userType)
    {
        if ($userType == 'Seller') {
            return $this->PRICE_SELLER;
        } else if ($userType == 'Subdis') {
            return $this->PRICE_SUBDIS;
        } else if ($userType == 'Distributor') {
            return $this->PRICE_DISTRIBUTOR;
        } else {
            return false;
        }
    }
}
