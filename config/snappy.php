<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => base_path().'\wkhtmltox\bin\wkhtmltopdf.exe',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => base_path().'\wkhtmltox\bin\wkhtmltoimage.exe',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
