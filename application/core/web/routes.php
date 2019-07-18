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
        'new-album' => [
            'controller' => 'account',
            'action' => 'newAlbum',
        ],
        'upload' => [
            'controller' => 'account',
            'action' => 'fileUpload',
        ],
        'gallery' => [
            'controller' => 'account',
            'action' => 'gallery',
        ],
        'places' => [
            'controller' => 'place',
            'action' => 'placeList',
        ],
        'place-page' => [
            'controller' => 'place',
            'action' => 'index',
        ],
        'test' => [
            'controller' => 'test',
            'action' => 'index',
        ],
	];