<?php
	return [
		'' => [
			'controller' => 'home',
			'action' => 'index',
		],
        'login' => [
            'controller' => 'account',
            'action' => 'login',
        ],
        'register' => [
            'controller' => 'account',
            'action' => 'register',
        ],
        'account' => [
            'controller' => 'account',
            'action' => 'index',
        ],
        'logout' => [
            'controller' => 'account',
            'action' => 'logout',
        ],
        'agreement' => [
            'controller' => 'account',
            'action' => 'agreement',
        ],
        'gallery' => [
            'controller' => 'account',
            'action' => 'gallery',
        ],
        'upload' => [
            'controller' => 'account',
            'action' => 'upload',
        ],
        'places' => [
            'controller' => 'place',
            'action' => 'placeList',
        ],
        'place-page' => [
            'controller' => 'place',
            'action' => 'index',
        ],
	];