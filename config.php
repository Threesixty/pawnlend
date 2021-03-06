<?php
setlocale(LC_TIME, 'fr_FR'); 
setlocale(LC_ALL, 'fr_FR.utf8');

$config = [
	'db' => [
		'name' => '2021_ihm_prj_ka_ld_mt',
		'user' => 'root',
		'pwd' => '',
		'host' => 'localhost',
	],
	'dbProd' => [
		'name' => 'sarii-stock',
		'user' => 'sarii-stock',
		'pwd' => 'SariiStock21',
		'host' => '10.0.247.25',
	],
	'mail' => [
        'host' => 'ssl0.ovh.net',
        'username' => 'noreply@sarii-stock.tech',
        'password' => 'SariiStock21',
        'port' => '465',
        'encryption' => 'ssl',
        'from' => [
        	'name' => 'Pawlend',
        	'email' => 'noreply@sarii-stock.tech',
        ],
		'admin' => [
			'name' => '{SARII-Stock} Admin',
			'email' => 'michael.convergence@gmail.com',
		],
	],
	'routes' => [
		'connexion' => [
			'layout' => false,
			'view' => 'signin',
			'auth' => false,
		],
		'404' => [
			'layout' => false,
			'view' => '404',
			'auth' => false,
		],
		'index' => [
			'layout' => true,
			'view' => 'dashboard',
			'auth' => true,
		],
		'produits' => [
			'layout' => true,
			'view' => 'products',
			'auth' => true,
		],
		'produit' => [
			'layout' => true,
			'view' => 'product',
			'auth' => true,
		],
		'lots-produits' => [
			'layout' => true,
			'view' => 'product-lots',
			'auth' => true,
		],
		'lot-produits' => [
			'layout' => true,
			'view' => 'product-lot',
			'auth' => true,
		],
		'historiqueProduit' => [
			'layout' => false,
			'view' => '',
			'auth' => true,
		],
		'prets' => [
			'layout' => true,
			'view' => 'lends',
			'auth' => true,
		],
		'pret' => [
			'layout' => true,
			'view' => 'lend',
			'auth' => true,
		],
		'commandes' => [
			'layout' => true,
			'view' => 'orders',
			'auth' => true,
		],
		'commande' => [
			'layout' => true,
			'view' => 'order',
			'auth' => true,
		],
		'utilisateurs' => [
			'layout' => true,
			'view' => 'users',
			'auth' => true,
		],
		'utilisateur' => [
			'layout' => true,
			'view' => 'user',
			'auth' => true,
		],
		'historiqueUtilisateur' => [
			'layout' => false,
			'view' => '',
			'auth' => true,
		],
		'categories' => [
			'layout' => true,
			'view' => 'categories',
			'auth' => true,
		],
		'categorie' => [
			'layout' => true,
			'view' => 'category',
			'auth' => true,
		],
	],
];
?>