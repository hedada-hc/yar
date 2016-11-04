<?php
include "../../taotoken/TopSdk.php";
class API {
    /**
     * the doc info will be generated automatically into service info page.
     * @params
     * @return
     */
    //服务端接口
    public function get_sort_data($parameter, $option = "foo") {
    	// get_sort_data api接口接受用户传入请求数据  传入的是一个对象
    	$db = json_decode($parameter);
    	//调用淘宝接口 传入请求的url地址s
    	$tao = $this->tao($db->url);
    	//生成地址返回给客户端 client_can_not_see
    	return $this->client_can_not_see($tao);

    }

    //淘宝接口
    public function tao($url=null){

    	$c = new \TopClient;
		$c->appkey = "23514562";
		$c->secretKey = "e2f81ff813bea88ca256f73ab8556eee";
		$req = new \WirelessShareTpwdCreateRequest;
		$tpwd_param = new \IsvTpwdInfo;
		$tpwd_param->text="超值活动，惊喜活动多多";
		$tpwd_param->url=$url;
		$tpwd_param->user_id="24234234234";
		$req->setTpwdParam(json_encode($tpwd_param));
		$resp = $c->execute($req);
		return $resp;
    }

 	//客户端 返回数据
    protected function client_can_not_see($name) {
    	$json = json_encode($name);
    	echo $json;

    }
}
//开启RPC  服务
$service = new Yar_Server(new API());
$service->handle();
?>