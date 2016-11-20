var numer = document.getElementById("n");
var oldval = numer.value
numer.value = 666666

/*s
var a = [];

 chrome.storage.local.set({'storagekey': a}, function() {
          // Notify that we saved.	
        });
 */
var cookie = getCookie("NICK");
var key = cookie.toString();
//console.log(key);

chrome.storage.local.get([key], function(result) {
        var array = result[key]?result[key]:[];
		//console.log(array);
        array.unshift(oldval);

        var jsonObj = {};
        jsonObj[key] = array;
        chrome.storage.local.set(jsonObj, function() {
            //console.log("Saved a new array item");
            //console.log(jsonObj);
        });
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
