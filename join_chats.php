<?php

require_once "../../vendor/autoload.php";

define('ACCESS_TOKEN' , 'YOURS VK ACCESS TOKEN HERE');
define('BOT_ID',464759220);
define('VK_ME_JOIN','vk.me/join');
define('REGEX_JOIN','/(https:\/\/vk\.me\/join\/[A-Za-z0-9\-_\/]+)/i');

$vk = new VK\Client\VKApiClient();

$posts = $vk->newsfeed()->search(ACCESS_TOKEN, array('q'=>VK_ME_JOIN,'count'=>10));

foreach($posts['items'] as $item){
	preg_match(REGEX_JOIN,$item['text'],$matches);
	logw($item,$matches[0]);
	try{
	$vk->messages()->joinChatByInviteLink(ACCESS_TOKEN, array('link'=>$matches[0]));
	} catch (Exception $e){
	}
	sleep(3);
}

function logw($item,$link){
	$file = fopen("vklinks","a");
	fwrite($file,"{$link} wall{$item['owner_id']}_{$item['id']}\n");
	fclose($file);
}
