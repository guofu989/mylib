<?php
namespace Guofu989\Mylib;

use AlibabaCloud\Client\AlibabaCloud;

class Alibaba{
    public static function init($id,$key){
        AlibabaCloud::accessKeyClient($id, $key)->regionId('cn-hangzhou')->asDefaultClient();
    }

    public static function sendMsg($sign,$temp,$mobile,$parm){
        try {
            $result = AlibabaCloud::rpc()
                ->product('Dysmsapi')
                // ->scheme('https') // https | http
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => [
                        'RegionId' => "cn-hangzhou",
                        'PhoneNumbers' => $mobile,
                        'SignName' => $sign,
                        'TemplateCode' => $temp,
                        'TemplateParam' => $parm,
                    ],
                ])->request();
            print_r($result->toArray());
        } catch (ClientException $e) {
                echo $e->getErrorMessage() . PHP_EOL;
        } catch (ServerException $e) {
            echo $e->getErrorMessage() . PHP_EOL;
        }
    }
}