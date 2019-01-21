<?php

namespace Modules\IcommerceFlatrate\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\IcommerceFlatrate\Entities\Configflatrate;
use Modules\IcommerceFlatrate\Http\Requests\CreateConfigflatrateRequest;
use Modules\IcommerceFlatrate\Http\Requests\UpdateConfigflatrateRequest;
use Modules\IcommerceFlatrate\Repositories\ConfigflatrateRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Setting\Contracts\Setting;
use Modules\Setting\Repositories\SettingRepository;

class ConfigflatrateController extends AdminBaseController
{
    /**
     * @var ConfigflatrateRepository
     */
    private $configflatrate;
    private $setting;

    public function __construct(ConfigflatrateRepository $configflatrate, SettingRepository $setting)
    {
        parent::__construct();
        $this->configflatrate = $configflatrate;
        $this->setting = $setting;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateConfigflatrateRequest $request
     * @return Response
     */
    public function store(CreateConfigflatrateRequest $request)
    {
        $this->configflatrate->create($request->all());

        return redirect()->route('admin.icommerce.shipping.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icommerceflatrate::configflatrates.title.configflatrates')]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Configflatrate $configflatrate
     * @param  UpdateConfigflatrateRequest $request
     * @return Response
     */
    public function update(Configflatrate $configflatrate, UpdateConfigflatrateRequest $request)
    {

       if($request->status=='on')
          $request['status'] = "1";
        else
          $request['status'] = "0";

        $data = $request->all();
        $token =$data['_token'];
        unset($data['_token']);
        unset($data['_method']);

        $newData['_token']=$token;

        foreach ($data as $key => $val)
            $newData['icommerceflatrate::'.$key ]= $val;

        $this->setting->createOrUpdate($newData);

        return redirect()->route('admin.icommerce.shipping.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icommerceflatrate::configflatrates.title.configflatrates')]));
    }

   
}
