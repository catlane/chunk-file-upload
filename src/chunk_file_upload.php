<?php
/**
 * Created by PhpStorm.
 * User: 猫巷
 * Email:catlane@foxmail.com
 * Date: 2019/5/29
 * Time: 9:26 AM
 */
return [
    'disks' => [

        'local' => [
            'driver' => 'local' ,
            'root' => storage_path ( 'app' ) ,
        ] ,

        'public' => [
            'driver' => 'local' ,
            'root' => storage_path ( 'app/public' ) ,
        ] ,
        'qiniu_live' => [//七牛云
            'driver' => 'qiniu' ,//如果是七牛云空间，必填qiniu
            'domains' => [
                'default' => '****' , //你的七牛域名
                'https' => '' , //你的HTTPS域名
                'custom'    => '****',                //你的自定义域名
            ] ,
            'access_key' => '****' ,  //AccessKey
            'secret_key' => '*****' ,  //SecretKey
            'bucket' => '***' ,  //Bucket名字
            'url' => '*******' ,  // 填写文件访问根url
        ]
    ] ,
    'default' => [
        'disk' => 'public' ,//默认磁盘
        'extensions' => 'jpg,png,mp4' ,//后缀
        'mimeTypes' => 'image/*,video/*' ,//类型
        'fileSingleSizeLimit' => 10737418240 ,//上传文件限制大小，默认10G,默认单位为b
    ]



];
