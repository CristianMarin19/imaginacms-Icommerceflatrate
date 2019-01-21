<?php

namespace Modules\IcommerceFlatrate\Entities;

class Configflatrate
{
    
    private $cost;
    private $status;

    public function __construct()
    {
        $this->cost = setting('icommerceflatrate::cost');
        $this->status = setting('icommerceflatrate::status');
    }

    public function getData()
    {
        return (object) [
            'cost' => $this->cost,
            'status' => $this->status,
        ];
    }
    
    
    /*
    public function setStatusAttribute($value)
    {
    	
    	if($value==="on"){
        	$this->attributes['status'] = 1;
    	}else{
    		$this->attributes['status'] = 0;
    	}

    }
    */

}
