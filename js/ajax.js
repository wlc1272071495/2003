var $ = {
    get: function (options) {

        var { url = "", data = "", async = true, dataType = "text", success } = options;

        var xhr = new XMLHttpRequest();

        if (typeof data == "object") { // 此方法不严谨(我们需要的是纯json类型的对象)

            var str = "";
            for (var key in data) {
                str += key + "=" + data[key] + "&";
            }
            data = str.substring(0, str.length - 1);
            // console.log(data);

        }

        // user=a123123&pwd=123123&phone=123123&email=1232123@qq.com

        xhr.open("get", url + "?" + data, async);

        xhr.send();

        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {
                // console.log(xhr.responseText);
                var result = xhr.responseText; // 接收的数据

                if (dataType.toLowerCase() == "json") {
                    result = JSON.parse(xhr.responseText);
                    // console.log(data);
                }

                if (success) {
                    success(result); // 实际参数
                }

            }

        }
    },
    post: function post(options) {

        var { url = "", data = "", async = true, dataType = "text", success } = options;

        var xhr = new XMLHttpRequest();

        if (typeof data == "object") { // 此方法不严谨(我们需要的是纯json类型的对象)

            var str = "";
            for (var key in data) {
                str += key + "=" + data[key] + "&";
            }
            data = str.substring(0, str.length - 1);
            // console.log(data);

        }

        // user=a123123&pwd=123123&phone=123123&email=1232123@qq.com

        xhr.open("post", url, async);

        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.send(data);

        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {
                // console.log(xhr.responseText);
                var result = xhr.responseText; // 接收的数据

                if (dataType.toLowerCase() == "json") {
                    result = JSON.parse(xhr.responseText);
                    // console.log(data);
                }

                if (success) {
                    success(result); // 实际参数
                }

            }

        }
    },
    ajax: function (options) {

        var { type = "get", url = "", data = "", async = true, dataType = "text", success } = options;

        var xhr = new XMLHttpRequest();

        if (typeof data == "object") { // 此方法不严谨(我们需要的是纯json类型的对象)

            var str = "";
            for (var key in data) {
                str += key + "=" + data[key] + "&";
            }
            data = str.substring(0, str.length - 1);
            // console.log(data);

        }

        // user=a123123&pwd=123123&phone=123123&email=1232123@qq.com

        if (type == "get") {
            xhr.open("get", url + "?" + data, async);
            xhr.send();
        } else if (type == "post") {
            xhr.open("post", url, async);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send(data);
        }

        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {
                // console.log(xhr.responseText);
                var result = xhr.responseText; // 接收的数据

                if (dataType.toLowerCase() == "json") {
                    result = JSON.parse(xhr.responseText);
                    // console.log(data);
                }

                if (success) {
                    success(result); // 实际参数
                }

            }

        }
    },
    ajax_1: function (options) {

        var { type = "get", url = "", data = "", async = true, dataType = "text", success, error } = options;

        try {
            var xhr = new XMLHttpRequest();

            if (typeof data == "object") { // 此方法不严谨(我们需要的是纯json类型的对象)

                var str = "";
                for (var key in data) {
                    str += key + "=" + data[key] + "&";
                }
                data = str.substring(0, str.length - 1);
                // console.log(data);

            }

            // user=a123123&pwd=123123&phone=123123&email=1232123@qq.com

            if (type == "get") {
                xhr.open("get", url + "?" + data, async);
                xhr.send();
            } else if (type == "post") {
                xhr.open("post", url, async);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send(data);
            }

            xhr.onreadystatechange = function () {
                try {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // console.log(xhr.responseText);
                        var result = xhr.responseText; // 接收的数据

                        if (dataType.toLowerCase() == "json") {
                            result = JSON.parse(xhr.responseText);
                            // console.log(data);
                        }

                        if (success) {
                            success(result); // 实际参数
                        }

                    }
                } catch (err) {
                    if (error) {
                        error(err);
                    }
                }

            }
        } catch (err) {  // 捕获的错误
            if (error) {
                error(err);
            }
        }
    }

}