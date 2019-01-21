<?php

namespace Modules\Icommerceflatrate\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Icommerce\Entities\ShippingMethod;

class IcommerceflatrateDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $options['init'] = "Modules\Icommerceflatrate\Http\Controllers\Api\IcommerceFlatrateApiController";
        $options['cost'] = 0;

        $params = array(
            'title' => trans('icommerceflatrate::icommerceflatrates.single'),
            'description' => trans('icommerceflatrate::icommerceflatrates.description'),
            'name' => config('asgard.icommerceflatrate.config.shippingName'),
            'status' => 0,
            'options' => $options
        );

        ShippingMethod::create($params);
    }
}
