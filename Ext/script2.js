
chrome.storage.local.get('numer', function (result) {
	var table = document.getElementById("result").innerHTML;
	table = table.replace(/666666(?![\s\S]*666666)/, result.numer);
	document.getElementById("result").innerHTML = table;
   });