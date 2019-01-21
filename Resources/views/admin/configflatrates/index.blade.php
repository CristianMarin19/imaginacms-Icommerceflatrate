@php

    $configuration = icommerceflatrate_get_configuration();
    $options = array('required' =>'required','step' => '0.01','min' => 0);

    if($configuration==NULL)
        $cStatus = 0;
    else
        $cStatus = $configuration->status;

    $formID = uniqid("form_id");

@endphp


{!! Form::open(['route' => ['admin.icommerceflatrate.configflatrate.update'], 'method' => 'put','name' => $formID]) !!}

<div class="col-xs-12">

    {!! Form::normalInputOfType('number','cost', trans('icommerceflatrate::configflatrates.table.cost'), $errors,$configuration,$options) !!}

    <div class="form-group">
        <div>
            <label class="checkbox-inline">
                <input name="status" type="checkbox"  @if($cStatus==1) checked @endif >{{trans('icommerceflatrate::configflatrates.table.activate')}}
            </label>
        </div>   
    </div>
   
    <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-flat">{{ trans('icommerceflatrate::configflatrates.button.save configuration') }}</button>
    </div>

</div>

{!! Form::close() !!}