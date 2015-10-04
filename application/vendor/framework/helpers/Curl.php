<?php  
namespace YKG\helpers;

/* 
* 来源: http://www.xuehuwang.com/ 
* 作者: 雪狐博客 
* 类用途: 实现抓取原创内容 
*/
class CURL  
 {    
       public static $cookie_file;  // 设置Cookie文件保存路径及文件名   
       public $loginurl;//登陆地地址  
       public $actionstr;//登陆参数  

       public function __construct()  
       {  
                self::$cookie_file=dirname(__FILE__)."/cookie_".md5(basename(__FILE__)).".txt";   
                if(!file_exists($this->cookie_file))  
                 { // 检测Cookie是否存在      
                 $str = $this->vget('jroam'); // 获取登录随机值      
                 preg_match("/name=\"formhash\" value=\"(.*?)\"/is",$str,$hash); // 提取登录随机值     
                 $this->vlogin($this->loginurl,$this->actionstr); // 登录获取Cookie      
                }   
       }  
                  
       public static function vlogin($url,$data){ // 模拟登录获取Cookie函数      
                $curl = curl_init(); // 启动一个CURL会话      
                curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址                  
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查      
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在      
                curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器      
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转      
                curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer      
                curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求      
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包      
                curl_setopt($curl, CURLOPT_COOKIEJAR, $this->cookie_file); // 存放Cookie信息的文件名称      
                curl_setopt($curl, CURLOPT_COOKIEFILE, $this->cookie_file); // 读取上面所储存的Cookie信息      
                curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环      
                curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容      
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回      
                $tmpInfo = curl_exec($curl); // 执行操作      
                if (curl_errno($curl)) {      
                   echo 'Errno'.curl_error($curl);      
                }      
                curl_close($curl); // 关闭CURL会话      
                return $tmpInfo; // 返回数据      
       }      
                    
       public static function vget($url){ // 模拟获取内容函数      
                $curl = curl_init(); // 启动一个CURL会话      
                curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址                  
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查      
                // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在      
                // curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器      
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转      
                curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer      
                curl_setopt($curl, CURLOPT_HTTPGET, 1); // 发送一个常规的Post请求      
                curl_setopt($curl, CURLOPT_COOKIEFILE, self::$cookie_file); // 读取上面所储存的Cookie信息      
                curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环      
                curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容      
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回      
                $tmpInfo = curl_exec($curl); // 执行操作      
                if (curl_errno($curl)) {      
                   echo 'Errno'.curl_error($curl);      
                }      
                curl_close($curl); // 关闭CURL会话      
                return $tmpInfo; // 返回数据      
       }      
                    
       function vpost($url,$data){ // 模拟提交数据函数      
                $curl = curl_init(); // 启动一个CURL会话      
                curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址                  
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查      
                // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在      
                // curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器      
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转      
                curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer      
                curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求      
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包      
                curl_setopt($curl, CURLOPT_COOKIEFILE, self::$cookie_file); // 读取上面所储存的Cookie信息      
                curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环      
                curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容      
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回      
                $tmpInfo = curl_exec($curl); // 执行操作      
                if (curl_errno($curl)) {      
                   echo 'Errno'.curl_error($curl);      
                }      
                curl_close($curl); // 关键CURL会话      
                return $tmpInfo; // 返回数据      
       }      
       function delcookie($cookie_file){ // 删除Cookie函数      
                @unlink($cookie_file); // 执行删除      
       }      
 }



// class Curl 
// {      

//         public static $is_proxy = false;

//         public $params = array(
//               'proxy'=>null,
//               'user_agent'=>null,
//               'cookie_file'=>null,
//           );

//         public static function vpost($url, $data) { // 模拟提交数据函数
//                 $curl = curl_init (); // 启动一个CURL会话
//                 if (self::$is_proxy) {
//                       //以下代码设置代理服务器
//                       //代理服务器地址
//                       curl_setopt ( $curl, CURLOPT_PROXY, self::$params['proxy']);
//                 }
//                 curl_setopt ( $curl, CURLOPT_URL, $url ); // 要访问的地址
//                 curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, 0 ); // 对认证证书来源的检查
//                 curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 1 ); // 从证书中检查SSL加密算法是否存在
//                 curl_setopt ( $curl, CURLOPT_USERAGENT, self::$params['user_agent'] ); // 模拟用户使用的浏览器
//                 @curl_setopt ( $curl, CURLOPT_FOLLOWLOCATION, 1 ); // 使用自动跳转
//                 curl_setopt ( $curl, CURLOPT_AUTOREFERER, 1 ); // 自动设置Referer
//                 curl_setopt ( $curl, CURLOPT_POST, 1 ); // 发送一个常规的Post请求
//                 curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data ); // Post提交的数据包
//                 curl_setopt ( $curl, CURLOPT_COOKIEFILE, self::$params ['cookie_file'] ); // 读取上面所储存的Cookie信息
//                 curl_setopt ( $curl, CURLOPT_TIMEOUT, 120 ); // 设置超时限制防止死循环
//                 curl_setopt ( $curl, CURLOPT_HEADER, 0 ); // 显示返回的Header区域内容
//                 curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 ); // 获取的信息以文件流的形式返回
//                 $tmpInfo = curl_exec ( $curl ); // 执行操作
//                 if (curl_errno ( $curl )) {
//                     echo 'Errno' . curl_error ( $curl );
//                 }
//                 curl_close ( $curl ); // 关键CURL会话
//                 return $tmpInfo; // 返回数据
//         }
 

// }
