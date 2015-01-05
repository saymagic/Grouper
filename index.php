<?php

  include_once('./libs/WeChat.php');
  
  class MyWechat extends Wechat {

    /**
     * 用户关注时触发，回复「欢迎关注」
     *
     * @return void
     */
    protected function onSubscribe() {
      $BackMsg = '欢迎您关注瑰族，要知道，吃，是一种态度。';
      $this->mysql->saveIntoUser($this->getRequest('ToUserName'),$this->getRequest('FromUserName'),
                                         $this->getRequest('CreateTime'),$this->getRequest('MsgType'),
                                         $this->getRequest('Event'),$BackMsg);
      $this->responseText($BackMsg);     
    }

    /**
     * 用户取消关注时触发
     *
     * @return void
     */
    protected function onUnsubscribe() {
      $this->mysql->userUnStub($this->getRequest('FromUserName'),$this->getRequest('MsgType'));
      // 「悄悄的我走了，正如我悄悄的来；我挥一挥衣袖，不带走一片云彩。」
    }

    /**
     * 用户点击按钮时触发
     *
     * @return void
     */
    protected function onMenuClick(){
      $EventKey = $this->getRequest('EventKey');
      $backMsg = '';
      switch($EventKey){
        case 'btn_csweather':
          $backMsg = $this->utils->getCSWeather();
          break;
        case 'btn_joke':
          $backMsg = $this->utils->getJoke();
          break;
        case 'btn_english':
          $backMsg = $this->utils->dailysentence();
          break;
        default:
          break;
       }
      $this->mysql->saveIntoBtnEvent($this->getRequest('ToUserName'),$this->getRequest('FromUserName'),$this->getRequest('CreateTime'),
                                $this->getRequest('MsgType'),$this->getRequest('Event'),$this->getRequest('EventKey'),$backMsg);
      $this->responseText($backMsg);
    }

    /**
     * 用户点击按钮View时触发
     *
     * @return void
     */
    protected function onMenuView(){
 $this->mysql->saveIntoBtnEvent($this->getRequest('ToUserName'),$this->getRequest('FromUserName'),$this->getRequest('CreateTime'),
                                $this->getRequest('MsgType'),$this->getRequest('Event'),$this->getRequest('EventKey'),"");    }

    /**
     * 收到文本消息时触发，回复收到的文本消息内容
     *
     * @return void
     */
    protected function onText() {
      $receiveMsg = $this->getRequest('Content');
      if(strpos($receiveMsg,'天气')!==false){
         $backMsg = $receiveMsg." : ".$this->utils->tuling($receiveMsg)."。\n".date('Y-m-j g:i:s');
      }else{
         $backMsg = $this->utils->tuling($receiveMsg);
      }
      $this->mysql->saveIntoText($this->getRequest('ToUserName'),$this->getRequest('FromUserName'),
                                  $this->getRequest('CreateTime'),$this->getRequest('Content'),$backMsg,
                                  $this->getRequest('MsgType'),$this->getRequest('MsgId'));
      $this->responseText($backMsg);
    }

    /**
     * 收到图片消息时触发，回复由收到的图片组成的图文消息
     *
     * @return voi
     */
    protected function onImage() {     
      $picurl = $this->getRequest('PicUrl');
      $saveurl = time().'.png';
      $s = new SaeStorage();
      $img = file_get_contents($picurl);  //括号中的为远程"\"#FF0000\"">图片地址
      $storage_url = $s->write('pictures' ,$saveurl , $img);  
      $BackMsg = "感谢您提供的图片。";
      $this->mysql->saveIntoPic($this->getRequest('ToUserName'),$this->getRequest('FromUserName'),$this->getRequest('CreateTime'),
                                $this->getRequest('MsgType'),$this->getRequest('PicUrl'),$this->getRequest('MediaId'),$this->getRequest('MsgId'),$storage_url,
                                $BackMsg);
      $this->responseText("感谢您提供的图片。");
    }

    /**
     * 收到地理位置消息时触发，回复收到的地理位置
     *
     * @return void
     */
    protected function onLocation() {
      $BackMsg = "感谢您地理位置的反馈。";
      $this->mysql->saveIntoLocation($this->getRequest('Location_X'),$this->getRequest('Location_Y'),$this->getRequest('Scale'),
                                     $this->getRequest('Label'),$this->getRequest('FromUserName'),$this->getRequest('MsgType'),
                                     $this->getRequest('ToUserName'),$this->getRequest('CreateTime'),$this->getRequest('MsgId'),$BackMsg);
      $this->responseText($BackMsg);
    }

    /**
     * 收到链接消息时触发，回复收到的链接地址
     *
     * @return void
     */
    protected function onLink() {
      $BackMsg = "感谢您提供的链接地址。";
      $this->mysql->saveIntoLink($this->getRequest('ToUserName'),$this->getRequest('MsgId'),$this->getRequest('CreateTime'),$this->getRequest('Url'),$this->getRequest('Description'),$this->getRequest('Title'),$this->getRequest('FromUserName'),$this->getRequest('MsgType'),$BackMsg);
      $this->responseText($BackMsg);
    }

    /**
    * 收到语音消息时出发
    *
    * @return void
    */
    protected function onVoice(){
      $receiveMsg = $this->getRequest('Recognition');
      if(strpos($receiveMsg,'天气')!==false){
         $backMsg = $receiveMsg." : ".$this->utils->tuling($receiveMsg)."。 \n".date('Y-m-j g:i:s');
      }else{
         $backMsg = $this->utils->tuling($receiveMsg);
      }
      $this->mysql->saveIntoVoice($this->getRequest('ToUserName'),$this->getRequest('FromUserName'),$this->getRequest('CreateTime'),
                                $this->getRequest('MsgType'),$this->getRequest('MediaId'),$this->getRequest('Format'),$this->getRequest('Recognition'),
                                $this->getRequest('MsgId'),$backMsg);
      $this->responseText($backMsg);
    }

    /**
    * 收到视频消息时出发
    *
    * @return void
    */
    protected function onVideo(){
      $BackMsg = "感谢您提供的视频。";
      $this->mysql->saveIntoPic($this->getRequest('ToUserName'),$this->getRequest('FromUserName'),$this->getRequest('CreateTime'),
                                $this->getRequest('MsgType'),$this->getRequest('ThumbMediaId'),$this->getRequest('MediaId'),$this->getRequest('MsgId'),$BackMsg);
      $this->responseText($BackMsg);
    }

    /**
     * 收到未知类型消息时触发，回复收到的消息类型
     *
     * @return void
     */
    protected function onUnknown() {
      $this->responseText('收到了未知类型消息：' . $this->getRequest('msgtype'));
    }

  }

  $wechat = new MyWechat('saymagic',true);
  $wechat->run();
