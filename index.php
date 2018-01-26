<?php 

echo phpinfo();
exit();

$data = $_REQUEST;
echo json_encode($data);
exit();

$soap = new SoapClient(null, array('uri' => 'http://cloud.xy.com','location' => 'http://cloud.xy.com/Soapctler/SoapBoutique'));
$BoutiqueKey 		= '00d2f4e8-2222-4416-9001-27247d63490d';
$ItemID 			= '3456789';
$SeasonCode 		= 'SS16';
$Brand 				= 'Gucci';
$ItemStyleCode 		= '80cc48';
$ItemFabricCode 	= 'a205';
$ItemColorCode 		= '002';
$GroupMatchId 		= '';
$Gender 			= 'Woman';
$Color 				= 'Red';
$Fabric 			= 'Cotton';
$Description 		= '';
$DetailedComposition = 'Cotton 80% Leather 20%';
$SizeAndFit 		= 'Lenght 66 Shoulder 45 Sleeve 55';
$MadeIn 			= 'Italy';
$PurchasePrice 		= '340,00';
$SalePrice 			= '820,00';
$OnSalePrice 		= '570,00';
$Pictures 			= 'http://url0.jpg;http://url1.jpg;http://url2.jpg;http://url3.jpg';

// $res = $soap->SetProduct($BoutiqueKey, $ItemID, $SeasonCode, $Brand, $ItemStyleCode, $ItemFabricCode, $ItemColorCode, $GroupMatchId, $Gender, $Color, $Fabric, $Description, $DetailedComposition, $SizeAndFit, $MadeIn, $PurchasePrice, $SalePrice, $OnSalePrice, $Pictures);

$Size 		= "XS";
$Barcode 	= "2058934520918";
$Stock 		= '2';
// $res = $soap->SetProductItem($BoutiqueKey, $ItemID, $Size, $Barcode, $Stock);


// $res = $soap->GetOrderHeaders($BoutiqueKey, $ItemID, $Size);

$ORDERID = "3456789";
// $res = $soap->GetOrderDetails($BoutiqueKey, $ORDERID);

$Status = 1;
$res = $soap->SetStatusOrder($BoutiqueKey, $ORDERID, $Status);

var_dump($res);
// echo $res;
die;


$f = (0===null);
var_dump($f);
die;

$data = file_get_contents('php://input');
var_dump($data);

// phpinfo();
die;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>js开发(js对象高阶操作)</title>
	</head>
	<style type="text/css">
		
	</style>
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/excanvas.js"></script>

	<script type="text/javascript">
	//对象操作--------------------------------------------------
		var my = my || {};
		my.name = 'zuoliguang';
		my.age = 28;
		my.sex = 'man';
		my.say = function(){
			var name = this.name || "test";
			var age = this.age || "0";
			return "你好！我叫"+name+",我今年"+age+"了";
		}
		my.faceSay = function(face_str){
			if (face_str.length > 0) {
				return "我"+face_str+"的说："+this.say();
			} else {
				return this.say();
			}
		}
		// console.log(my.faceSay(""));
		
	//创建公共实用类 ------------------------------------------
	function Person(name, age){
		this.name = name;
		this.age = age;
		this.say = function(){
			return '生来就can说话';
		}
		this.do = function(){
			return 'dosomething';
		}
	}
	var yy = new Person("zuoliguang",28);
	var tt = yy || {};
	// console.log(tt);

	//js属性工具类属性命名规范----------------------------------
	// 初始化js对象
	  var obj = {
	    a: 'A',
	    b: 'B',
	    'c-d-e': 'CDE'
	  };
	 
	  // 遍历器
	  Object.keys(obj).forEach(function(element, index, arr) {
	    // console.log('Key ' + element + ' has value ' + obj[element]);
	  });

	  //数组的过滤器（筛选器）,对数组每个元素进行筛选
	  var numbers = [11, 3, 7, 9, 100, 20, 14, 10];
	  var numbersGreaterTen = numbers.filter(function(element) {
	    return element > 10;
	  });
	  // console.log('From the list of numbers ' + numbers + ' only ' + numbersGreaterTen + ' are ok');
	  
	  //数组数据的累加方式
	  var arr = [10, 3, 7, 9, 100, 20];
	  var sum = arr.reduce(function(prevValue, currentValue) {
	    return prevValue + currentValue;
	  }, 0);
	  // console.log('The sum of array ' + arr + ' is: ' + sum);
	
	//---set:特点自动去重---------------------------------------------------------
	var s = new Set([1,2,2,3,4,5,5,5,6,'6']);
	// console.log(s.size);
	// console.log(s);

	//---遍历的方式 for-of 和 for-in-----------------------------------------------
	var a = ['a','b','c'];
	a.name = 'test';
	// console.log(a);
	   //使用for-of 不显示属性name（推荐使用）
	   for(var i of a) {
	   		// console.log(i);
	   }
	   //使用for-in 显示所有的属性信息(解决历史遗留的问题)
	   for(var i in a) {
	   		// console.log(a[i]);
	   }
	var a = ['A', 'B', 'C', 'name'];
	a.forEach(function (element) {
	    // console.log(element);
	});

	//---函数批量处理内元素计算----------------------------------------------------------
	function pow(x){ return x*x; }
	function powf(x){ return x+'个'; }
	var arr = [1,2,3,4,5,6,7,8,9];
	newarr = arr.map(powf);//直接的批量处理每个元素
	// console.log(newarr);

	//---sort 排序----------------------------------------------------------------------
	var arr_sort = [9,7,5,3,4,2,3,5,6,7,8,7,8,8,2,3,1,3,4,5];
	arr_sort.sort(function(x, y){
		if (x > y) { return 1; }
		if (x < y) { return -1; }
		return 0;
	});
	// console.log(arr_sort);

	//----时间对象处理Date---------------------------------------------------------------------
	var now = new Date();
	// console.log(now);
	// console.log(now.getFullYear());//年
	// console.log(now.getMonth());//月
	// console.log(now.getDate());//日
	// console.log(now.getDay());//星期
	// console.log(now.getHours());//小时
	// console.log(now.getMinutes());//分钟
	// console.log(now.getSeconds());//秒
	// console.log(now.getMilliseconds());//毫秒
	// console.log(now.getTime());//时间戳
	
	//---------------------------------------------------------------------------------

	//创建类的老方法（不推荐）
	var Student = {
		name:'student',
		age:20,
		run:function(){
			// console.log(this.name + ' is running , now ' + this.name + ' is a student');
		}
	}
	var xiaoming = {
		name:'xiaoming'
	}
	xiaoming.__proto__ = Student; //该位置操作相当于小明继承了Student类
	xiaoming.run();


	var Bird = {
		fly:function(){
			// console.log(this.name + " is flying , now " + this.name + " is a bird");
		}
	}
	xiaoming.__proto__ = Bird;//这个时候xiaoming变成了一只鸟;没有了run的能力，具备了fly的能力;
	xiaoming.fly();

	//----------------------------------------------------------------------------------

	//使用class继承类，构造方法实现类（推荐：面向对象的开发方式）
	class Body{
		constructor(name) {
			this.name = name || '';
		}
		say() {
			console.log("holle ,"+this.name);
		}
		run() {
			console.log(this.name + " is running");
		}
		relog(str) {
			console.log(str);
		}
	}

	class Man extends Body {
		constructor(name){
			super(name);
			this.sex = 'man';
		}
		say() {
			console.log(this.name + " say: hey ! man");
		}
	}

	var pp = new Body('peipe');
	// console.log(pp);
	// pp.say();
	// pp.run();
	// pp.relog('this is an word for test');
	var ppm = new Man('jack');
	// ppm.say();

	//------------------------------------------------------------------------------------
	
	//获取浏览器相关信息及操作
	var browW = window.innerWidth;//浏览器的宽度(除去了浏览器的工具栏占用部分)
	var browH = window.innerHeight;//浏览器的高度(除去了浏览器的工具栏占用部分)
	// console.log(browW + "-" + browH);
	var navigator = window.navigator; //真实调用该功能时，要在浏览器端设置，向谷歌共享数据（国内大局域网环境效果并不理想）

	//------------------------------------------------------------------------------------
	
	var loca = window.location;
	// console.log(loca.href);
	// console.log(loca.protocol);
	// console.log(loca.host);
	// console.log(loca.port);
	// console.log(loca.pathname);
	// console.log(loca.search);
	// console.log(loca.hash);

	//----------------------------------------------------------------------------------

	//DOM 添加元素
	//我要在β星球朋友的前面出现
	var tier,tier1,tier2,tier3,tier4;
	function dl4(){
		$("#d5").html('不来算了，我要走了,再见！');
		var timer = setTimeout('$("#d5").remove()',3000);
		if (tier4) {
			window.clearInterval(tier4);
		}
	}
	function dl3(){
		var dd = $("#d5").clone();
		dd.html('你要不要来抓我？？？？');
		$("#d5").remove();
		$("#d2").before(dd);
		if (tier3) {
			window.clearInterval(tier3);
		}
		tier4 = window.setInterval('dl4()',3000); 
	}
	function dl2(){
		var dd = $("#d5").clone();
		dd.html('学会成为一个无敌的存在，哈哈哈');
		$("#d5").remove();
		$("#d4").before(dd);
		if (tier2) {
			window.clearInterval(tier2);
		}
		tier3 = window.setInterval('dl3()',3000); 
	}
	function dl1(){
		var dd = $("#d5").clone();
		dd.html('我是来插队的，哈哈哈');
		$("#d5").remove();
		$("#d1").before(dd);
		if (tier1) {
			window.clearInterval(tier1); 
		}
		tier2 = window.setInterval('dl2()',3000);
	}
	function dl(){
		$("#d3").before('<div id="d5">我是来捣乱的，哈哈哈</div>');
		if (tier) { 
			window.clearInterval(tier); 
		}
		tier1 = window.setInterval('dl1()',3000);
	}

	tier = window.setInterval('dl()',3000);

	//TODO 再此想说明的是该位置的DOM操作使用js源代码操作证实jquery要比较方便快捷;
	//	
	//---图片上传服务器之前既传既看-----------------------------------------------------

	//该位置的重点在于使用文件阅读器 FileReader 的使用
	$(function(){
		var file_input = document.getElementById('getImg');
		$("#getImg").change(function() {
			var file 		= file_input.files[0];
			var reader 		= new FileReader();
			reader.onload 	= function(e){
				var data 	= e.target.result;
				var imgmsg 	= '<img style="height:150px;" src="'+data+'"/>';
				$("#imgshow").empty().append(imgmsg);
			}
			reader.readAsDataURL(file);
		});
	})

	//----------------------------------------------------------------------------------
	//---jQuery 的特殊用法 !!var
	//只要变量的值为:0、null、" "、undefined或者NaN都将返回的是false，反之返回的是true
	var vara = 0;
	var varb = null;
	var varc = "";
	var vard = undefined;
	var fiter = !!vard;
	// console.log(fiter);
	
	// 使用+将字符串转换成数字
	var intStr = "123.99";
	// console.log(+intStr);
	// console.log(typeof(intStr));
	// console.log(typeof(+intStr));

	// 并条件符 && 做if条件使用
	// true && alert(22);

	// 使用||运算符
	var age = undefined;//变量的值为:0、null、" "、undefined 值时，判断为false 变量赋值 || 后面的值
	var vare = age || 90;
	// console.log(vare);


	// -----------------------------------------------------------------------------------
	// 调试输出的数据格式
	var tableData = [
		{name:'zuoliguang001',age:23},
		{name:'zuoliguang002',age:24},
		{name:'zuoliguang003',age:25},
		{name:'zuoliguang004',age:26},
		{name:'zuoliguang005',age:27}
	];
	console.table(tableData);


	</script>
	<body>
		<div id="list">
			<p>下面几位只是来表演 移动 的《群众演员》</p>
			<div id="d1">我只是来客串的群众演员αα，我来自α星球</div>
			<div id="d2">我只是来客串的群众演员γγ，我来自γ星球</div>
			<div id="d3">我只是来客串的群众演员ββ，我来自β星球</div>
			<div id="d4">我只是来客串的群众演员δδ，我来自δ星球</div>
		</div>
		<hr/>

		<div id="img">
			<input id="getImg" type="file" name="">
			<div id="imgshow" style="width: 200px;height: 200px;"></div>
		</div>
		<hr/>

		

	</body>
</html>
