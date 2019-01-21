<?php


use Modules\IcommerceFlatrate\Entities\Configflatrate;

if (! function_exists('icommerceflatrate_get_configuration')) {

    function icommerceflatrate_get_configuration()
    {
    	$configuration = new Configflatrate();
        return $configuration->getData();
    }

}


// Initial Method
if (! function_exists('icommerceflatrate_Init')) {

    function icommerceflatrate_Init($products,$options = array()){

       	$resultMethods = [];

       	$conf = icommerceflatrate_get_configuration();

        $response["price"] = $conf->cost;
        $response["priceshow"] = true;

        $response["data"] = null;
	    $response["msj"] = "success";
	    
	    return $response;
        
    }

}