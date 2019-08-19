<?php
	return [
		'' => [
			'controller' => 'home',
			'action' => 'index',
		],
        'about' => [
            'controller' => 'about',
            'action' => 'index',
        ],
        'album/[0-9]+' => [
            'controller' => 'album',
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
        'account/agreement' => [
            'controller' => 'account',
            'action' => 'agreement',
        ],
        'account/new-album' => [
            'controller' => 'account',
            'action' => 'newAlbum',
        ],
        'account/upload' => [
            'controller' => 'account',
            'action' => 'fileUpload',
        ],
        'account/gallery(\?del_album=[0-9]+)?' => [
            'controller' => 'account',
            'action' => 'gallery',
        ],
        'account/gallery/album/[0-9]+' => [
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
        'photo-flow' => [
            'controller' => 'photoflow',
            'action' => 'index',
        ],
        'test' => [
            'controller' => 'test',
            'action' => 'index',
        ],
	];