
/*	
var version = 1.0;
var auther = 'LiGuangZuo';
The use of this class depends on the JQuery code library 
*/

/* ==================Date===================== */

var now = new Date();

/* 获取年 */
function getYear(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getFullYear();
    }
    return now.getFullYear();
}

/* 获取月 */
function getMonth(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getMonth();
    }
    return now.getMonth();
}


/* 获取天 */
function getDay(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getDate();
    }
    return now.getDate();
}

/* 获取小时 */
function getHour(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getHours();
    }
    return now.getHours();
}

/* 获取分钟 */
function getMinute(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getMinutes();
    }
    return now.getMinutes();
}

/* 获取秒 */
function getSecond(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getSeconds();
    }
    return now.getSeconds();
}

/* 获取毫秒 */
function getMilliseconds(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getMilliseconds();
    }
    return now.getMilliseconds();
}

/* 获取当前星期 */
function getWeekDay(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
    if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	return newDate.getDay();
    }
    return now.getDay();
}

/* 是否是闰年 */
function isLeapYear(unixTimestamp){
	unixTimestamp = unixTimestamp || null;
	var flag = false;
	if (unixTimestamp != null) {
    	var newDate = new Date(unixTimestamp * 1000);
    	var year = newDate.getFullYear();
    } else {
    	var year = now.getFullYear();
    }
    
    if((year % 4 == 0 && year % 100 !=0) || (year % 400 == 0)){
        flag = true;
    }

    return flag;
}

/* ===================String======================= */
$(function(){
	$.fn.extend({
		/*-----是否邮箱编码---------------*/
		isEmail:function(){
			var email = $(this).selector;
			var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
			if (reg.test(email)) {
				return true;
			}
			return false;
		},
		/*-----是否手机号码---------------*/
		isTelphone:function(){
			var tel = $(this).selector;
			var reg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
			if (reg.test(tel)) {
				return true;
			}
			return false;
		},
		/*-----是否电话号码---------------*/
		isPhone:function(){
			var phone = $(this).selector;
			var reg = /^(\(\d{3,4}\)|\d{3,4}-|\s)?\d{7,14}$/;
			if (reg.test(phone)) {
				return true;
			}
			return false;
		},
		/*-------验证身份证号码-----------*/
		isIDCard:function(){
			var ID = $(this).selector;
			var reg = /^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i;
			if (reg.test(ID)) {
				return true;
			}
			return false;
		},
		/*-----是否QQ号码---------------*/
		isQQ:function(){
			var qq = $(this).selector;
			var reg = /^[1-9][0-9]{4,9}$/;
			if (reg.test(qq)) {
				return true;
			}
			return false;
		},
		/*-----是否中文---------------*/
		isZh:function(){
			var str = $(this).selector;
			var reg = /^([u4E00-u9FA5]|[uFE30-uFFA0])*$/;
			if (reg.test(str)) {
				return false;
			}
			return true;
		},
		/*-----去掉字符串前后的空格----*/
		trimAll:function(){
			var str = $(this).selector;
			return str.replace(/(^\s*)|(\s*$)/g, '');
		},
		/*------去掉字符串前的空格-----*/
		trimLeft:function(){
			var str = $(this).selector;
			return str.replace(/^\s*/g,'');
		},
		/*------去掉字符串后的空格------------*/
		trimRight:function(){
			var str = $(this).selector;
			return str.replace(/\s*$/,'');
		},
		/*------忽略大小写判断字符串是否相同--------------*/
		isEqualsIgnorecase:function(str2){
			var str1 = $(this).selector;
			if(str1.toUpperCase() == str2.toUpperCase()) {
		        return true;
		    }
		    return false;
		},
		/*---------判断是否为空------------------*/
		isEmpty:function(){
			var str = $(this).selector;
			if ( (str == null || typeof(str) == 'undefined') || (typeof(str) == 'string' && str == '' && str != 'undefined') ) {
				return true;
			} else {
				return false;
			}
		},
		/*---------字符串截取后面加入省略号----------------*/
		interceptString:function(len){
			var str = $(this).selector;
			if (str.length > len) {
				return str.substring(0, len) + '...';
			} else {
				return str;
			}
		}
	});
})

/* ==================data(页面缓存)=================== */

/* =====================Browser======================= */

/* ======================Array======================== */

/* =======================File======================== */

/* =======================Math======================== */
