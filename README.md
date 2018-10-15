# vkjoiner
ВКонтакте вступление по ссылкам в беседы из поиска

composer require vkcom/vk-php-sdk

Пишем свой токен в скрипт
Ставим скрипт на крон с запуском раз в час ( 0 * * * * )



А да. еще надо добавить в vendor\vkcom\vk-php-sdk\src\VK\Actions

Следущий код: 
~~~~ 
	public function joinChatByInviteLink(string $access_token, array $params = array()) {
        return $this->request->post('messages.joinChatByInviteLink', $access_token, $params);
    }
~~~~ 
