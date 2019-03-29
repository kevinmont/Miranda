var app = app || {};

app.Util = app.Util || {};

app.Util.Regex = app.Util.Regex || {};

(function (w) {
    app.sendAjax = function (method, url, payload, callback) {
        if (!method && !url)
            throw new Error("Paramaters missing");
        const httpRequest = new XMLHttpRequest();
        httpRequest.open(method, url);
        httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        httpRequest.onreadystatechange = function (event) {
            if (httpRequest.readyState === 4 &&
                httpRequest.status === 200) {
                callback(JSON.parse(httpRequest.responseText));
            }
        }
        httpRequest.send(payload);
    }

    app.Util.afterProductGet = function (data) {
        console.log(data);
    }

    w.onload = function () {
        var payload = "";

        app.sendAjax('GET', 'controllers/ProductosController.php', payload,
            app.Util.afterProductGet);
    }

}(window))