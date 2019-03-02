<?php

class modVatSelector extends modVatSelector_parent
{
    /**
     * get Country specific VAT for user
     *
     * @param oxUser $oUser        given user object
     * @param bool   $blCacheReset reset cache
     *
     * @throws oxObjectException if wrong country
     * @return double | false
     */
    public function getUserVat( oxUser $oUser, $blCacheReset = false )
    {
        // Check if for the country VAT is defined.
        if ( ( $dVat = parent::getUserVat( $oUser, $blCacheReset ) ) === false ) {
            $myConfig = oxRegistry::getConfig();
            $countryId = $oUser->getActiveCountry();
            $sQLQuery = "SELECT werde_country_specific_vat FROM oxcountry WHERE oxid = '{$countryId}'";
            $countrySpecificVAT = oxDb::getDb()->getOne($sQLQuery);
            $countrySpecificVAT = (int)$countrySpecificVAT;
            if($countrySpecificVAT){
                $dVat = $countrySpecificVAT;
            }
        }
        return $dVat;
    }
}