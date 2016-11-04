<?php
// $client = new Yar_Client("http://www.a.com/yar");
// var_dump($client);
//Yar_Client 实例化 Yar 客户端 传入 yar 接口
$client = new Yar_Client('http://localhost/yar-master/tests/htdocs/testapi.php');

$json=[
	'url'=>"https://detail.tmall.com/item.htm?id=535516283185"
];
//yar 默认接受json格式数据 所以传入数据要转为json格式数据
$json=json_encode($json);
//调用服务端方法get_sort_data 用来接受传入的值
$return = $client->get_sort_data($json);
echo $return;