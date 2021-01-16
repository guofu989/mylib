<?php
namespace Guofu989\Mylib\Fun;

class Str{
    //生成随机字符串
    static public function getRand($len=10){
        $strs="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        $str=substr(str_shuffle($strs),0,$len);
        return $str;
    }

    //生成不重复随机字符串
    static public function uniqueRand($len=10){
        return md5(time().self::getRand($len));
    }

    //aes加密
    static public function aesEncrypt($data, $key) {
        $data =  openssl_encrypt($data, 'aes-128-ecb', $key, OPENSSL_RAW_DATA);
        return base64_encode($data);
    }

    //aes解密
    static public function aesDecrypt($data, $key) {
        $encrypted = base64_decode($data);
        return openssl_decrypt($encrypted, 'aes-128-ecb', $key, OPENSSL_RAW_DATA);
    }

    /**
     * @description: 字符串补0到指定长度 
     * @param len int 需要补到的指定长度，默认2
     * @return {*}
     */
    static public function add0($str,$len = 2){
        if(strlen($str) < $len){
            $j = $len - strlen($str);
            for ($i=0; $i < $j; $i++) { 
                $str = '0'.$str;
            }
        }
        return $str;
    }
}