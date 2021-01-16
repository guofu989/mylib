<?php
namespace Guofu989\Mylib;

class Wx{
    //获取token
    public function getToken(){
        $token = Cache::get('access_token');
        if(!$token){
            $AppID = config('wxconfig')['AppID'];
            $AppSecret = config('wxconfig')['AppSecret'];
            $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$AppID&secret=$AppSecret";
            $re = file_get_contents($url);
            $re = json_decode($re,true);
            $token = $re['access_token'];
            Cache::set('access_token',$token,$re['expires_in']-1000);
        }
        return $token;
    }
}