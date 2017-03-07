if (typeof XMLHttpRequest == "undefined") {
    XMLHttpRequest = function() {
        return new ActiveXObject(
            navigator.userAgent.indexOf("MSIE 5") >=0 ? "Microsoft.XMLHTTP" : "Msxml2.XMLHTTP"
        );
    }
}
var xml = new XMLHttpRequest();
