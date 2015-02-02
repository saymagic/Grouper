<?php


$utils = new WX_FUNCTIONS();
class WX_FUNCTIONS
{

    /**
    * 该类用于封装所有查询操作。
    *
    */
    public function tuling($reqInfo){
      $apiKey = "2d6672ad4f23c2f29c87e63ecfa323dc"; 
      $apiURL = "http://www.tuling123.com/openapi/api?key=KEY&info=INFO";

      // 设置报文头, 构建请求报文 
        // header("Content-type: text/html; charset=utf-8"); 
      $url = str_replace("INFO", $reqInfo, str_replace("KEY", $apiKey, $apiURL)); 

      $res =file_get_contents($url); 
      $text = json_decode($res)->{'text'};
      return $text; 
    }

    public function getCSWeather(){
      return $this->tuling('长沙天气');
    }

    public function getJoke(){
      return $this->tuling("讲个笑话");
    }

    //每日英语部分
    public function dailysentence(){
        include('simple_html_dom.php');
        $arrMsg = array();
        for($i=0;$i<10;$i++){
            $url="http://news.iciba.com/dailysentence";
            $html = file_get_html($url);
            foreach($html->find("a") as $m)
            {
                array_push($arrMsg,$m->plaintext);
            }

        }
        return trim($arrMsg[45].$arrMsg[46]); 
    }

    
    public function getAccessToken(){
        //更换成自己的APPID和APPSECRET, 需在微信公众平台后台的开发者中心界面获取
        $APPID="********";
        $APPSECRET="*******";

        $TOKEN_URL="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$APPSECRET;

        $json=file_get_contents($TOKEN_URL);
        $result=json_decode($json);

        return $result->access_token;
    }

       

}

?>