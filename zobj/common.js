/*
* @Author: xiyou_zlg
* @Date:   2017-05-23 12:21:10
* @Last Modified by:   xiyou_zlg
* @Last Modified time: 2017-09-20 10:16:38
*/

function include(array) {
	for (var i = 0, length = array.length; i < length; i++) {
		document.write("<script language=javascript src='"+array[i]+"'></script>");
	}
}
function test(){
	alert('test hahaha !');
}