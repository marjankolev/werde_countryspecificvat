<?php

use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\DbMetaDataHandler;
use OxidEsales\Eshop\Core\Module\Module;

class countryspecificvat_events extends oxUbase{


	public static function onActivate(){
		// Call function that is adding column when module is activated
		self::addColumn();
	}

	protected static function addColumn(){
		$dbMetaDataHandler = oxNew(DbMetaDataHandler::class);
        $oxDb = DatabaseProvider::getDb();
        // Check if the field is not exist, only then alter the table
        if (!$dbMetaDataHandler->fieldExists('werde_country_specific_vat', 'oxcountry')) {
            $sql = "ALTER TABLE oxcountry ADD werde_country_specific_vat INT NOT NULL DEFAULT 0";
            $oxDb->execute($sql);
        }
	}
}