<?php

return [
    'currency_id'  =>  1,
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.avatar.size' => [200, 200],
    'phone1'  => '',
    'phone1f' => '',
    'currency_id' => 'USD',
    'companyName'  => 'Nyxta',
    'bsVersion' => '5.x',
    'icon-framework' => \kartik\icons\Icon::FAS,
    'page'=>[
		'imgFilePath' => '\\web\\image\\blog\\',
		'imgFileUrl' => '\\web\\image\\blog\\',
		'userModel' => app\models\User::class,
		'userPK' => 'id',
		'userName' => 'username',  'urlManager' => 'urlManager',
		'pagePostPageCount' => 10,
		'pageCommentPageCount' => 20,
		'userModel' => app\models\User::class,
		'userPk' => 'id', 'userName' => 'username',
		'enableComments' => true
	],
    
];
