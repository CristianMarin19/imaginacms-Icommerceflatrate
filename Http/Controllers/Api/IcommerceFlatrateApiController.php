<?php

namespace Modules\Icommerceflatrate\Http\Controllers\Api;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Base Api
use Modules\Ihelpers\Http\Controllers\Api\BaseApiController;

// Repositories
use Modules\Icommerceflatrate\Repositories\IcommerceFlatrateRepository;

use Modules\Icommerce\Repositories\ShippingMethodRepository;


class IcommerceFlatrateApiController extends BaseApiController
{

    private $icommerceFlatrate;
    private $shippingMethod;
   
    public function __construct(
        IcommerceFlatrateRepository $icommerceFlatrate,
        ShippingMethodRepository $shippingMethod
    ){
        $this->icommerceFlatrate = $icommerceFlatrate;
        $this->shippingMethod = $shippingMethod;
    }
    
    /**
     * Init data
     * @param Requests request
     * @param Requests array(items,total)
     * @param Requests options array (countryCode,postCode,country)
     * @return route
     */
    public function init(Request $request){

        try {

            $shippingName = config('asgard.icommerceflatrate.config.shippingName');

            // Configuration
            $attribute = array('name' => $shippingName);
            $shippingMethod = $this->shippingMethod->findByAttributes($attribute);

            // Msj
            $response["msj"] = "success";

            // Items
            $response["items"] = null;

            // Price
            $response["price"] = $shippingMethod->options->cost;
            $response["priceshow"] = true;
            
          } catch (\Exception $e) {
            //Message Error
            $status = 500;
            $response = [
              'errors' => $e->getMessage()
            ];
        }

        return response()->json($response, $status ?? 200);

    }
    
    

}