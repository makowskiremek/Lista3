/*
chrome.storage.local.get('numer', function (result) {
	var table = document.getElementById("result").innerHTML;
	table = table.replace(/666666(?![\s\S]*666666)/, result.numer);
	document.getElementById("result").innerHTML = table;
   });
*/
var cookie = getCookie("NICK");
var key = cookie.toString();
//console.log(key);

chrome.storage.local.get([key], function(result) {
        var array = result[key]?result[key]:[];
        //console.log(array);
        for (var i = 0; i < array.length; i++) {
        	var table = document.getElementById("result").innerHTML;
			table = table.replace(/666666(?![\s\S]*666666)/, array[i]);
			document.getElementById("result").innerHTML = table;
        }
        
    });

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}