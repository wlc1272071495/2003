// 对于中文问题   存的时候编码   取得时候解码
function setCookie(key, val, day, path = "/") {
    if (day) {  // 设置过期时间
        var date = new Date();
        // date.setSeconds(date.getSeconds() + 300); //    5分钟 
        // date.setMinutes(date.getMinutes() + 30); //    30分钟
        date.setDate(date.getDate() + day);
        document.cookie = key + "=" + encodeURIComponent(val) + ";expires=" + date.toUTCString() + ";path=" + path;
    } else { //  没有设置
        document.cookie = key + "=" + encodeURIComponent(val) + ";path=" + path;
    }
}



function getCookie(key) {
    var cookie = document.cookie;
    if (cookie) {
        var dataList = cookie.split("; ");
        for (var i = 0; i < dataList.length; i++) {
            var item = dataList[i];
            // console.log(item);
            var attr = item.split("=")[0];
            var val = item.split("=")[1];
            if (key === attr) {   // 键名相同
                return decodeURIComponent(val);
            }

        }
        return "";
    } else {
        return "";
    }
}