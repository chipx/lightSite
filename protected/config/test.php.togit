<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
            'db'=>array(
                'connectionString' => 'mysql:host=vj.nevosoft.local;dbname=lightSite',
                'emulatePrepare' => true,
                'username' => 'vintos_chip',
                'password' => '25790227',
                'charset' => 'utf8',
            ),
		),
	)
);
