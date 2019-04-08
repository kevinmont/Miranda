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
        if (data.status === 200) {
            const productRow = document.getElementById('product-row'); // to get template
            const parent = productRow.parentElement; // to get its parent
            data.products.forEach(product => {
                var template = productRow.innerHTML; // change content to string type
                var newProduct = template.replace('{{id}}', product.id)
                    .replace('{{imagen}}', product.imagen)
                    .replace('{{nombre}}', product.nombre)
                    .replace('{{color}}', product.color)
                    .replace('{{descripcion}}', product.descripcion)
                    .replace('{{estilo}}', product.estilo)
                    .replace('{{material}}', product.material)
                    .replace('{{estampado}}', product.estampado)
                    .replace('{{precio}}', product.precio)
                parent.appendChild($(newProduct)[0]); // add to the parent as its child
            });
        } else
            throw new Error("No data was returned by the server");
    }

    app.Util.afterGetLineas = function (response) {
        console.log(response);
        
        if (response.status === 200) {
            const lineaSelectElement = document.getElementById('linea');
            lineaSelectElement.classList.add("text-uppercase");
            response.data.forEach(linea => {
                var option = document.createElement('option');
                option.innerHTML = linea.nombre;
                option.value = linea.id;
                lineaSelectElement.appendChild(option);
            })
        } else
            throw new Error("No data was returned by the server");
    }

    w.onload = function () {
        console.log("onload")
        var payload = "";

        app.sendAjax('GET', 'controllers/ProductosController.php', payload,
            app.Util.afterProductGet);
        app.sendAjax('GET', 'controllers/LineasController.php', payload,
            app.Util.afterGetLineas);
    }
}(window))