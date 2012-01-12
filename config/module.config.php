<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'spiffydatatables_data_service' => 'SpiffyDataTables\Service\Data'
            ),
            'Zend\View\HelperLoader' => array(
                'parameters' => array(
                    'map' => array(
                        'datatable' => 'SpiffyDataTables\View\Helper\DataTable',
                    ),
                ),
            ),
        )
    )
);
