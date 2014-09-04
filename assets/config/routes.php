<?php

return array(
	'default' => array(
		'(/<controller>(/<action>(/<id>)))', 
		array(
			'controller' => 'main',
			'action' => 'index'
		),
	),
    'admin' => array('/admin(/<controller>(/<action>(/<id>)))', array(
        'namespace' => 'App\Admin',
        'controller' => 'Admin',
        'action' => 'index'
    ),
    ),
);
