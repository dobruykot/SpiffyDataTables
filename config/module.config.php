<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'spiffy_datatables_data' => 'SpiffyDataTables\Service\Data'
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
