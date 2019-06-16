<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>代码测试</title>
<link rel="stylesheet" type="text/css" href="//liupeiqing.com/css/css.css">
<link rel="stylesheet" href="//y.gtimg.cn/mediastyle/yqq/layout_0412.css?max_age=25920000&v=20190312" />
<link rel="stylesheet" href="//y.gtimg.cn/mediastyle/yqq/search_6cb3d91b.css?max_age=2592000" />
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?dc0a9f74719932327a75b77fc43f75ce";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
 <script src="//g.alicdn.com/ku/bigview.runtime/1.1.4/bigview.runtime.min.js"></script>
</head>
<body>
<div id="navMenu">
<ul>
    <li class="onelink"><a href='//liupeiqing.com/index.htm' target="_blank">主页</a></li>
    <li><a href='//liupeiqing.com/youku.php' rel='dropmenu1' target="_blank">视频</a></li>
    <li><a href='//liupeiqing.com/mp3' target="_blank">音乐MP3</a></li>
    <li><a href='//liupeiqing.com/soku.php' target="_blank">搜索</a></li>
  </ul>
</div>
<script type='text/javascript' src='//liupeiqing.com/js/dropdown.js'></script>
<ul id="dropmenu1" class="dropMenu">
    <li><a href="//liupeiqing.com/youku.php" target="_blank">优酷</a></li>
    <li><a href="//liupeiqing.com/qq.php" target="_blank">腾讯</a></li>
</ul>
<script type="text/javascript">cssdropdown.startchrome("navMenu")</script>
    <form action="yqso.php" method="get"style="margin:15px auto;">
        <input type="text" name="w" style="width: 400px;height:30px;border-radius: 18px;"/>
        <input type="submit" value="搜索"style="width: 40px;height: 35px;border-radius: 18px;" />
    </form>

<?php
function url($url) {//设置一个自定义
$user = $_SERVER['HTTP_USER_AGENT'];//获取用户相关信息
$ch = curl_init();//初始化一个cURL对象
$timeout = 40;
curl_setopt($ch, CURLOPT_USERAGENT, $user);//在HTTP请求中包含一个”user-agent”头的字符串。
curl_setopt($ch, CURLOPT_URL, $url);//设置你要抓取的网站$url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置cURL参数，要求结果保存到字符串0为显示到屏幕中
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);//在发起连接前等待的时间
@ $file = curl_exec($ch);//运行cURL，请求网页
curl_close($ch);//关闭URL请求
       return $file;//输出
}
if(isset ($_GET['w'])){
$i=$_SERVER['REQUEST_URI'];
$id=str_replace('/yqso.php?w=','',$i);//替换地址
	//$id=$_GET['q'];
	$a = iconv("utf-8","gb2312",urldecode($id));//先解码
    if ($a==""){//判断是不是为空
 	$a = urlencode(iconv("gb2312","UTF-8",$id));//编码
 	} else {
     $a = urlencode(iconv("gb2312","UTF-8",$a));//编码
    }
$so= url('http://localhost/https.php?url=https://c.y.qq.com/soso/fcgi-bin/client_search_cp?w='.$a);//当前搜索页面
preg_match_all('|songmid":"(.*)","songname":"(.*)"|iUs', $so, $i);
preg_match_all('|","name":"(.*)"|iUs', $so, $n);
preg_match_all('|"mid":"(.*)","name":"(.*)"|iUs', $so, $g);
foreach($g[1] as $d=>$v){//遍历数组
$x.= url('http://localhost/yqlb.php');
$x=str_replace('urlgeming',$v,$x);//替换ID
$x=str_replace('urlgeshou','',$x);//替换歌手
$x=str_replace('geshou',$g[2][$d],$x);//替换歌手
$x=str_replace('geming',$i[2][$d],$x);//替换歌名
//$x.='ID:'.$v.' 歌名：'.$g[1][$d].' 歌手：'.$n[1][$d].'<br>';
}
}elseif($_GET['i']){
}else{
$so= url('http://localhost/https.php?url=https://c.y.qq.com/soso/fcgi-bin/client_search_cp?w=%E9%BB%98');//当前搜索页面
preg_match_all('|songmid":"(.*)","songname":"(.*)"|iUs', $so, $i);
preg_match_all('|","name":"(.*)"|iUs', $so, $n);
preg_match_all('|"mid":"(.*)","name":"(.*)"|iUs', $so, $g);
foreach($i[1] as $d=>$v){//遍历数组
$x.= url('http://localhost/yqlb.php');
$x=str_replace('urlgeming',$v,$x);//替换ID
$x=str_replace('urlgeshou','',$x);//替换歌手
$x=str_replace('geshou',$g[2][$d],$x);//替换歌手
$x=str_replace('geming',$i[2][$d],$x);//替换歌名
//$x.='ID:'.$v.' 歌名：'.$g[1][$d].' 歌手：'.$n[1][$d].'<br>';
}


}
//echo $x;
?>
<ul class="songlist__header">
<li class="songlist__header_name">歌曲</li>
<li class="songlist__header_author">歌手</li>
</ul>
<ul class="songlist__list">
<!--插入歌单-->
<?echo $x;?>
</ul>
<P>本网站提供的资源内容均系转载链接各大网站，</P>
<P>本网站只提供web页面服务，并不提资源资源存储，上传。</P>
<P>若本站收录的内容无意侵犯了贵司版权，请给网页底部邮箱地址来信，我们会及时处理和回复，谢谢</P>
<P>联系邮箱：842633334@qq.com,微信13475606401</P>
</body>
</html>
