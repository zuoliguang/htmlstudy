<?php 

// header("Content-type:text/html;charset=utf-8");

// 获取当前文件的全名称，不含路径
// var_dump(pathinfo(__FILE__, PATHINFO_BASENAME));

//语句替换方法测试strtr();
// echo strtr("Hilla Warld",['Hi'=>'aa','ld'=>'cc']);
//对应的单词位置替换测试;
// echo strtr("Aittw Wwrtd!",'Aiwt','Heol');

// $mystring = 'abc';
// $findme   = 'a';
// $pos = strpos('abc cde', 'd');
// var_dump($pos);

//新三元运算
// $time = 0;
// $time = $time ?: time();
// var_dump(date('Y-m-d H:i:s',$time));

//生成网址的短连接
/*function code62($x){ 
    $show=''; 
    while($x>0){ 
        $s=$x % 62; 
        if ($s>35){ 
            $s=chr($s+61); 
        }elseif($s>9&&$s<=35){ 
            $s=chr($s+55); 
        } 
        $show.=$s; 
        $x=floor($x/62); 
    } 
    return $show; 
} 
function shorturl($url){ 
    $url=crc32($url); 
    $result=sprintf("%u",$url); 
    return code62($result); 
}
echo "<a href='http://".shorturl("http://www.helloweba.com/")."'>"."www.helloweba.com"."</a>";*/
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>js开发测试</title>
	</head>
	<style type="text/css">
		#test {border: 1px solid; width:50px; height:50px;cursor: pointer;} button { margin: 5px; }
	</style>
	<link type='text/css' rel='stylesheet' href='dept_select/chosen.css'/>
	<link type="text/css" rel="stylesheet" href="timepicker/css/jquery-ui.css" />
	<link rel="stylesheet" type="text/css" href="simditor/styles/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="simditor/styles/simditor.css" />
    <link rel="stylesheet" type="text/css" href="simditor/styles/simditor.css" />

	<script src="js/jquery-1.7.1.min.js" ></script>
	<script src="Minigrid/js/minigrid.js"></script>
	<script src="dept_select/chosen.jquery.js"></script>
	<script src="timepicker/js/jquery-ui.js"></script>
	<script src="timepicker/js/jquery-ui-slide.min.js"></script>
	<script src="timepicker/js/jquery-ui-timepicker-addon.js"></script>
	<script src="Distpicker/js/distpicker.data.js"></script>
	<script src="Distpicker/js/distpicker.js"></script>
	<script src="tableExport/tableExport.js"></script>
	<script src="simditor/scripts/js/module.js"></script>
    <script src="simditor/scripts/js/uploader.js"></script>
    <script src="zelect/zelect.js"></script>

    <script src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">var jquery_211 = $.noConflict(true);</script><!-- 兼容多版本jQuery使用 -->
    <script src="simditor/scripts/js/simditor.js"></script>

<script type="text/javascript">
	$(function(){
		//1、js 缓存数据 $().data()
		$("#test").data("test-data", {
			first: 16,
			last: "pizza!",
			word: "this is a test words,saw it ,make me fell happy!"
		});
		var a = $("#test").data("test-data").first;
		var b = $("#test").data("test-data").last;
		// console.log(a);
		// console.log(b);

		//2、添加插件 jQuery.fn.extend()
		jQuery.fn.extend({
			get_cache_data: function() {
				return this.data("test-data");
			}
		});

		//3、事件绑定 $().bind()
		$("#test").bind('click', function() {
			var data = $('#test').get_cache_data();
			// console.log(data);
		});

		//4、遍历对象，数组 $.each([],function(i,n){})
		var arr = new Array();
		for (var i = 0; i < 10; i++) {
			var obj = new Object();
			obj.id = i + 1;
			obj.name = 'test' + (i + 1);
			obj.age = (i + 1) * 5;
			arr.push(obj);
		}

		$.each(arr, function(i, person) {
			// console.log( "我是" + person.id + "号选手,我叫" + person.name + ",我今年" + person.age + "岁" );
		});

		//5、遍历对象数组过滤不符合条件信息 $.grep([],function(i,n){})
		$.grep(arr, function(person, i) {
			if (person.age >= 30) {
				// console.log( "我没有被淘汰:我是" + person.id + "号选手,我叫" + person.name + ",我今年" + person.age + "岁" );
			} else {
				// console.log( "我被淘汰了:我是" + person.id + "号选手,我叫" + person.name + ",我今年" + person.age + "岁" );
			}
		});

		//6、拓展 $.extend()
		var empty = {};
		var settings = {
			validate: false,
			limit: 5,
			name: "foo"
		};
		var options = {
			validate: true,
			name: "bar"
		};
		jQuery.extend(empty, settings, options); // 将对象元素属性依次拓展到empty位置的对象中去

		//7、将页面元素序列化到数组中 $().toArray()
		var li_data = $("#lis > li").toArray();
		$.each(li_data, function(i, li) {
			var i = $(li).html();
			// console.log(i);
		});

		//8、序列化表单信息 $("form").serialize() 
		$("#getformdata").bind('click', function() {
			var form_data = $("form").serializeArray();
			// console.log(form_data);
		});
				
		//9、动画效果显示 $().animate({});
		// $("#test").animate({
		// 	width: "90%",
		// 	height: "300px"
		// },5000).delay(1000).animate({
		// 	width: "50px",
		// 	height: "50px"
		// },3000);

		//10、获取浏览器信息
		function get_browser() {
			var userAgent = navigator.userAgent;
			if (userAgent.indexOf("Opera") > -1) {
				return "Opera";
			};
			if (userAgent.indexOf("Firefox") > -1) {
				return "Firefox";
			}
			if (userAgent.indexOf("Chrome") > -1) {
				return "Chrome";
			}
			if (userAgent.indexOf("Safari") > -1) {
				return "Safari";
			}
			if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {
				return "IE";
			};
			return null;
		}

		//11、通过ip获取地理信息
		$.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(_result) {
			if (remote_ip_info.ret == '1') {
				var country = remote_ip_info.country; //国家
				var province = remote_ip_info.province; //省份
				var city = remote_ip_info.city; //城市
				var district = remote_ip_info.district; //地区
			}
		});


		//12、canvas 绘图( 绘制圆形 )
		function draw_cricle(id) {
			var canvas = document.getElementById(id);
			if (canvas == null) {
				return false;
			}
			var context = canvas.getContext('2d');
			context.beginPath();
			context.arc(100, 100, 50, 0, Math.PI * 2, true);
			context.closePath();
			context.fillStyle = 'rgba(0,255,0,0.25)';
			context.fill();
		}
		draw_cricle("cricle");


		//13、绘图（绘制矩形）
		function draw_rect(id) {
			var canvas = document.getElementById(id)
			if (canvas == null)
				return false;
			var context = canvas.getContext("2d");
			//实践表明在不设施fillStyle下的默认fillStyle=black
			context.fillRect(0, 0, 100, 100);
			//实践表明在不设施strokeStyle下的默认strokeStyle=black
			context.strokeRect(120, 0, 100, 100);

			//设置纯色
			context.fillStyle = "red";
			context.strokeStyle = "blue";
			context.fillRect(0, 120, 100, 100);
			context.strokeRect(120, 120, 100, 100);

			//设置透明度实践证明透明度值>0,<1值越低，越透明，值>=1时为纯色，值<=0时为完全透明
			context.fillStyle = "rgba(255,0,0,0.2)";
			context.strokeStyle = "rgba(255,0,0,0.2)";
			context.fillRect(240, 0, 100, 100);
			context.strokeRect(240, 120, 100, 100);
			// context.clearRect(50, 50, 240, 120);
		}
		draw_rect("rect");


		//14、绘图（绘制html）
		function draw_img(id) {
			var image = new Image();
			image.src = "img/html.jpg";
			var canvas = document.getElementById(id);
			if (canvas == null)
				return false;
			var context = canvas.getContext("2d");
			context.fillStyle = "#EEEEFF";
			context.fillRect(0, 0, 400, 300);
			image.onload = function() {
				context.drawImage(image, 0, 0);
			}
		}
		draw_img("html_icon");

		//15、绘制字体
		function draw_font(id) {
			var canvas = document.getElementById(id);
			if (canvas == null)
				return false;
			var context = canvas.getContext("2d");
			context.fillStyle = "#EEEEFF";
			context.fillRect(0, 0, 400, 300);
			context.fillStyle = "#00f";
			context.font = "italic 30px sans-serif";
			context.textBaseline = 'top';
			//填充字符串
			var txt = "fill示例文字,一个测试案例";
			context.fillText(txt, 0, 0);
			var length = context.measureText(txt);
			context.fillText("长" + length.width + "px", 0, 50);
			//填充字符串
			context.font = "bolid 30px sans-serif";
			txt = "stroke示例文字,一个案例";
			length = context.measureText(txt);
			context.strokeText(txt, 0, 100);
			context.fillText("长" + length.width + "px", 0, 150);
		}
		draw_font("font");
		        
		//16、保存图片出来
		function save_draw(id) {
			var canvas = document.getElementById(id);
			if (canvas == null)
				return false;
			var context = canvas.getContext("2d");
			context.fillStyle = "rgb(0,0,225)";
			context.fillRect(0, 0, canvas.width, canvas.height);
			context.fillStyle = "rgb(255,255,0)";
			context.fillRect(10, 20, 50, 50);
			//把图像保存到新的窗口
			var data = canvas.toDataURL("image/jpeg");
			// console.log(data);
		}
		save_draw("savedraw");

		//17、js获得图片像素点的操作

		function nook_the_jpg_color(or_id, id) {
			//获取图片的信息
			var or_img = document.getElementById(or_id);
			var w = or_img.width;
			var h = or_img.height;
			$("#" + id).attr({
				width: w,
				height: h
			});
			// $("#clone_img").attr({width:w,height:h});
			var img_url = or_img.src + "?" + Date.parse(new Date());
			var image = new Image();
			image.src = img_url;
			var canvas = document.getElementById(id);
			// var clone_img = document.getElementById("clone_img");
			if (canvas == null)
				return false;
			var context = canvas.getContext("2d");
			// var clone_context = clone_img.getContext("2d");
			context.fillStyle = "#EEEEFF";
			context.fillRect(0, 0, 400, 300);
			image.onload = function() {
				context.drawImage(image, 0, 0);
			}
			for (var i = 1; i <= h; i++) {
				for (var j = 1; j <= w; j++) {
					//像素信息
					// var data = canvas.getPixelColor(j, i);
				}
			}

		}
		nook_the_jpg_color("parse_test_img", "parse_img")

		//18、js设置瀑布流设置
		function minigrid_init() {
			minigrid('.grid', '.grid-item', 6, null, function() {
				var d = document.querySelector('.grid-demo');
				d.style.opacity = 1;
			});
			window.addEventListener('resize', function() {
				minigrid('.grid', '.grid-item');
			});
		}
		$("#grid-more").bind("click", function() {
			var item = '<div class="grid-item" style="height: 100px;"></div>';
			var con = '';
			for (var i = 0; i < 10; i++) {
				con += item;
			}
			$(".grid").append(con);
			minigrid_init();
		});
		minigrid_init();

		//19、可搜索下拉控件
		function select_more() {
			$('.dept_select').chosen();
		}
		select_more();

		//20、时间插件
		$('#datetime').datetimepicker();

		//21、地域选择插件
		$("#distpicker").distpicker({
			province: "浙江省",
			city: "杭州市",
			district: "西湖区"
		});

		//13、js的excel导出插件
		function exportTo(id, type) {
			tableExport(id, 'test_name', type);
		}
		$('#export_xls').click(function() {
			exportTo('firm_table', 'xls');
		});

		//14,一款下拉匹配的插件
		$('#zelect_s').zelect({ placeholder:'Plz select...' });
		
		//15、测试 js插件功能
		function test() {
			
		}
	});
</script>

<!-- （多版本jQuery版本冲突的问题解决方案） -->
<script type="text/javascript">
	jquery_211(function() {
		window.$ = jquery_211;
		//14、一款在线编辑器 simediter 
		function simediter_init() {
			var editor = new Simditor({
				textarea: $('#editor_input')
			});
		}
		simediter_init();
	});
</script>
	<body>
		<p>----------------------------------------------</p>
		
		
		<p>----------------------------------------------</p>
		<p>zelect 简单的下拉插件</p>
		<style type="text/css">
			section { margin-bottom: 40px; }
    		section:after { content: "."; display: block; height: 0; clear: both; visibility: hidden; }

		    #intro .zelect { display: inline-block; background-color: white; min-width: 300px; cursor: pointer; line-height: 36px; border: 1px solid #dbdece; border-radius: 6px; position: relative;}
		    #intro .zelected { font-weight: bold; padding-left: 10px; }
		    #intro .zelected.placeholder { color: #999f82; }
		    #intro .zelected:hover { border-color: #c0c4ab; box-shadow: inset 0px 5px 8px -6px #dbdece; }
		    #intro .zelect.open { border-bottom-left-radius: 0; border-bottom-right-radius: 0; }
		    #intro .dropdown { background-color: white; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; border: 1px solid #dbdece; border-top: none; position: absolute; left:-1px; right:-1px; top: 36px; z-index: 2; padding: 3px 5px 3px 3px; }
		    #intro .dropdown input { font-family: sans-serif; outline: none; font-size: 14px; border-radius: 4px; border: 1px solid #dbdece; box-sizing: border-box; width: 100%; padding: 7px 0 7px 10px; }
		    #intro .dropdown ol { padding: 0; margin: 3px 0 0 0; list-style-type: none; max-height: 150px; overflow-y: scroll; }
		    #intro .dropdown li { padding-left: 10px; }
		    #intro .dropdown li.current { background-color: #e9ebe1; }
		    #intro .dropdown .no-results { margin-left: 10px; }
		</style>
		<section id="intro">
			<select id="zelect_s">
		      <option>I really have</option>
		      <option>to think of some</option>
		      <option>significantly more</option>
		      <option>relevant example data</option>
		      <option>here.</option>
		      <option>Also, need more and longer items</option>
		      <option>to demo scroll</option>
		    </select>
		</section>

		<p>----------------------------------------------</p>
		<p>一款在线编辑器 simediter （查看js代码，多版本jQuery的冲突解决）</p>
		<textarea id="editor_input" placeholder="这里输入内容" autofocus></textarea>

		<p>----------------------------------------------</p>

		<p>一款多请求（可修改）下拉内容匹配</p>
		<script language="javascript" type="text/javascript" src="auto_suggest/js/jquery.coolautosuggest.js"></script>
		<script language="javascript" type="text/javascript" src="auto_suggest/js/jquery.coolfieldset.js"></script>
		<link rel="stylesheet" type="text/css" href="auto_suggest/css/jquery.coolfieldset.css" />
		<link rel="stylesheet" type="text/css" href="auto_suggest/css/jquery.coolautosuggest.css" />
		<input type="text" name="text1" id="text1" />
		<script language="javascript" type="text/javascript">
			$("#text1").coolautosuggest({
				url:"test.php?chars=",
				width:300
			});
		</script>


		<p>----------------------------------------------</p>
		<p>js的excel导出插件</p>
		<button id="export_xls">excle导出</button>
		<style type="text/css">
			#firm_table tr td { border: 1px solid } #firm_table tr td:first-child { display: none; }
		</style>
		<div class="table-responsive">
          	<table id="firm_table" class="table table-striped table-bordered table-hover">
	            <thead>
	              	<tr>
		                <th>id</th>
		                <th>FirstName</th>
		                <th>LastName</th>
		                <th>E-Mail</th>
		                <th>Number</th>
	              	</tr>
	            </thead>
	            <tbody>
					<tr>
						<td>1</td>
						<td>Delpha</td>
						<td>siliciophite</td>
						<td>circumflex@masterwork.net</td>
						<td>997300858</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Paula</td>
						<td>Ausiello</td>
						<td>bemirrorment@moy.edu</td>
						<td>779213455</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Gaynell</td>
						<td>Salguero</td>
						<td>smoothpate@podalgia.edu</td>
						<td>999908414</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Otelia</td>
						<td>Nitta</td>
						<td>hispanophile@auditorship.edu</td>
						<td>947377435</td>
					</tr>
					<tr>
						<td>5</td>
						<td>Darren</td>
						<td>Maltez</td>
						<td>toxotidae@tut.net</td>
						<td>902590424</td>
					</tr>
					<tr>
						<td>6</td>
						<td>Larraine</td>
						<td>Zelasco</td>
						<td>lanciers@unpleasantish.co.uk</td>
						<td>668639791</td>
					</tr>
	            </tbody>
	        </table>
        </div>

		<p>----------------------------------------------</p>
		<p>地域选择插件</p>
		<div id="distpicker">
			<select></select>
			<select></select>
			<select></select>
		</div>

		<p>----------------------------------------------</p>
		<p>时间插件datetimepicker</p>
		<style type="text/css">
			a{color:#007bc4; text-decoration:none;}
			a:hover{text-decoration:underline}
			ol,ul{list-style:none}
			body{height:100%; font:12px/18px Tahoma, Helvetica, Arial, Verdana, "\5b8b\4f53", sans-serif; color:#51555C;}
			img{border:none}
			.demo{width:500px; margin:20px auto}
			.demo h4{height:32px; line-height:32px; font-size:14px}
			.demo h4 span{font-weight:500; font-size:12px}
			.demo p{line-height:28px;}
			input{width:200px; height:20px; line-height:20px; padding:2px; border:1px solid #d3d3d3}
			pre{padding:6px 0 0 0; color:#666; line-height:20px; background:#f7f7f7}

			.ui-timepicker-div .ui-widget-header { margin-bottom: 8px;}
			.ui-timepicker-div dl { text-align: left; }
			.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
			.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
			.ui-timepicker-div td { font-size: 90%; }
			.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }
			.ui_tpicker_hour_label,.ui_tpicker_minute_label,.ui_tpicker_second_label,.ui_tpicker_millisec_label,.ui_tpicker_time_label{padding-left:20px}
		</style>
		<input type="text" id="datetime" />
		

		<p>----------------------------------------------</p>
		<p>加搜索功能的下拉框</p>
		<select id="dept" class="dept_select" name="dept" data-placeholder="选择" style="width:210px;">
			<option value="">--选择--</option>
			<option value="test_1">test_1</option>
			<option value="test_2">test_2</option>
			<option value="test_3">test_3</option>
			<option value="测试——1">测试——1</option>
			<option value="测试——2" selected="selected">测试——2</option>
			<option value="测试——3">测试——3</option>
			<option value="搜索——1">搜索——1</option>
			<option value="搜索——2">搜索——2</option>
		</select>

		<p>----------------------------------------------</p>
		<style type="text/css">
			.grid-demo { position: relative; opacity: 0; transition: .2s ease; margin-bottom: 60px; }
			.grid { position: relative;margin: 0 auto;width: 98%; }
			.grid-item { position: absolute;top: 0;left: 0;width: 180px;height: 120px;border-radius: 3px;background-color: #EDEDED;
	                     -webkit-transition: .3s ease-in-out;-o-transition: .3s ease-in-out;transition: .3s ease-in-out;border: 1px solid #ADADAD;}
			@media (max-width: 600px) { .grid-item {width: 120px;height: 80px;}
		}
		</style>
		<p>minigrid 瀑布流</p>
		<button id="grid-more">加载</button>
		<div class="grid-demo">
	        <div class="grid">
	          <div class="grid-item" style="height: 50px;"></div>
	          <div class="grid-item" style="height: 200px;"></div>
	          <div class="grid-item" style="height: 80px;"></div>
	          <div class="grid-item" style="height: 20px;"></div>
	          <div class="grid-item" style="height: 45px;"></div>
	          <div class="grid-item" style="height: 100px;"></div>
	          <div class="grid-item" style="height: 156px;"></div>
	        </div>
		</div>

		<p>----------------------------------------------</p>
		<p>方形及js缓存</p>
		<div id="test"></div>

		<p>----------------------------------------------</p>
		<ul id="lis">
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li>4</li>
			<li>5</li>
			<li>6</li>
			<li>7</li>
			<li>8</li>
			<li>9</li>
		</ul>

		<p>----------------------------------------------</p>

		<form>
		  <select name="single">
		    <option>Single</option>
		    <option>Single2</option>
		  </select><br/>
		  <select name="multiple">
		    <option>Multiple</option>
		    <option>Multiple2</option>
		    <option selected="selected">Multiple3</option>
		  </select><br/>
		  <input type="checkbox" name="check" value="check1"/> check1
		  <input type="checkbox" name="check" value="check2" checked="checked"/> check2
		  <br/>
		  <input type="radio" name="radio" value="radio1" checked="checked"/> radio1
		  <input type="radio" name="radio" value="radio2"/> radio2
		</form>
		<button id="getformdata" >getformdata</button>

		<p>----------------------------------------------</p>
		<p>绘制圆形</p>
		<canvas id="cricle" width="200" height="200"></canvas>

		<p>----------------------------------------------</p>
		<p>绘制矩形</p>
		<canvas id="rect" width="340" height="220"></canvas>

		<p>----------------------------------------------</p>
		<p>绘制html5标志</p>
		<canvas id="html_icon" width="400" height="300"></canvas>

		<p>----------------------------------------------</p>
		<p>绘制字体</p>
		<canvas id="font" width="400" height="300"></canvas>

		<p>----------------------------------------------</p>
		<p>绘制字体</p>
		<canvas id="savedraw" width="400" height="300"></canvas>

		<p>----------------------------------------------</p>
		<p>绘制多边形</p>
		<canvas id="can" style="border: 1px solid;" width="400" height="300">你的浏览器不支持canvas </canvas></br>
  		多边形边数：
  		<input type="text" id="t1" size="3"/>
  		<input type="button" value="提交" onclick="get();" /></br>

		<p>----------------------------------------------</p>
		<p>看视频</p>
		<video id="video1" controls="controls" width="600" autoplay="autoplay" loop="loop">
		  	<source src="/video/video.mp4" type='video/mp4'>
		</video>

		<p>----------------------------------------------</p>
		<p>抖动的css</p>
		<link rel="stylesheet" type="text/css" href="cssshack/csshake.css">
		<button class="shake"> .shake </button>
		<button class="shake-little"> .shake-little </button>
		<button class="shake-slow"> .shake-slow </button>
		<button class="shake-hard"> .shake-hard </button>
		<button class="shake-horizontal"> .shake-horizontal </button>
		<button class="shake-vertical"> .shake-vertical </button>
		<button class="shake-rotate"> .shake-rotate </button>
		<button class="shake-opacity"> .shake-opacity </button>
		<button class="shake-crazy"> .shake-crazy </button>
		<button class="shake-chunk"> .shake-chunk </button>

		<p>----------------------------------------------</p>
		<p>js获得图片像素点</p>
		<img id="parse_test_img" style="display:none" src="img/html.jpg">
		<canvas id="parse_img"></canvas>
		<!-- <canvas id="clone_img"></canvas> -->



		<script type="text/javascript">
			//绘制多边形的操作
			var r = 80; //圆半径
			var x0 = 200;
			var y0 = 150;
			var x = [];
			var y = [];

			function get() {
				var n = new Number(document.getElementById("t1").value); //角的数量
				var canvas = document.getElementById('can');
				var context = canvas.getContext('2d');
				context.clearRect(0, 0, 400, 300);
				draw(context, n);
			}

			function drawLine(context, x1, y1, x2, y2) {
				context.strokeStyle = '#663300';
				context.beginPath();
				context.moveTo(x1, y1);
				context.lineTo(x2, y2);
				context.stroke();
			}

			function draw(context, n) {
				var t = 6.28318 / n;
				for (i = 0; i < n; i++) {
					x[i] = Math.round(r * Math.cos(i * t) + x0);
					y[i] = Math.round(r * Math.sin(i * t) + y0);
				}
				for (i = 0; i <= n - 2; i++) {
					for (j = i + 1; j <= n - 1; j++)
						drawLine(context, x[i], y[i], x[j], y[j]);
				}
			}

			function init() {
				var canvas = document.getElementById('can');
				var context = canvas.getContext('2d');
				draw(context, 20);
			}
			window.addEventListener("load", init, true);
		</script>
	</body>
</html>
