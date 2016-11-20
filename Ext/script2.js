/*
chrome.storage.local.get('numer', function (result) {
	var table = document.getElementById("result").innerHTML;
	table = table.replace(/666666(?![\s\S]*666666)/, result.numer);
	document.getElementById("result").innerHTML = table;
   });
*/
chrome.storage.local.get(["storagekey"], function(result) {
        var array = result.storagekey?result.storagekey:[];

        for (var i = 0; i < array.length; i++) {
        	var table = document.getElementById("result").innerHTML;
			table = table.replace(/666666(?![\s\S]*666666)/, array[i]);
			document.getElementById("result").innerHTML = table;
        }
        
    });