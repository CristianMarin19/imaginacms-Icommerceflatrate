<?php

return [
    'formFields' => [
        'title' => [
            'value' => null,
            'name' => 'title',
            'type' => 'input',
            'isTranslatable' => true,
            'props' => [
                'label' => 'icommerce::common.title',
            ],
        ],
        'description' => [
            'value' => null,
            'name' => 'description',
            'type' => 'input',
            'isTranslatable' => true,
            'props' => [
                'label' => 'icommerce::common.description',
                'type' => 'textarea',
                'rows' => 3,
            ],
        ],
        'status' => [
            'value' => '0',
            'name' => 'status',
            'type' => 'select',
            'props' => [
                'label' => 'icommerce::common.status',
                'useInput' => false,
                'useChips' => false,
                'multiple' => false,
                'hideDropdownIcon' => true,
                'newValueMode' => 'add-unique',
                'options' => [
                    ['label' => 'Activo', 'value' => '1'],
                    ['label' => 'Inactivo', 'value' => '0'],
                ],
            ],
        ],
        'mainimage' => [
            'value' => (object) [],
            'name' => 'mediasSingle',
            'type' => 'media',
            'props' => [
                'label' => 'Image',
                'zone' => 'mainimage',
                'entity' => "Modules\Icommerce\Entities\ShippingMethod",
                'entityId' => null,
            ],
        ],
        'init' => [
            'value' => 'Modules\Icommerceflatrate\Http\Controllers\Api\IcommerceFlatrateApiController',
            'name' => 'init',
            'isFakeField' => true,
        ],
        'cost' => [
            'value' => null,
            'name' => 'cost',
            'isFakeField' => true,
            'type' => 'input',
            'props' => [
                'label' => 'icommerceflatrate::icommerceflatrates.table.cost',
                'type' => 'number',
            ],
        ],

    ],

];
