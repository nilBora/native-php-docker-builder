<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docker Build Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .result-textarea {
            background-color: #f8f9fa;
            border: none;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h3>Docker Build Form</h3>
            <form id="formSettings" method="POST" action="/api/v1/make/dockerfile">
                <div class="mb-3">
                    <label for="dockerLogin" class="form-label">Docker Login</label>
                    <input type="text" class="form-control" id="dockerLogin" placeholder="Enter Docker Login">
                </div>
                <div class="mb-3">
                    <label for="dockerPassword" class="form-label">Docker Password</label>
                    <input type="password" class="form-control" id="dockerPassword" placeholder="Enter Docker Password">
                </div>
                <button type="button" class="btn btn-primary" id="btnSave">Save</button>
                <hr>
                <div class="mb-3">
                    <label for="dockerImages" class="form-label">Docker Images</label>
                    <select class="form-select" id="dockerImages" name="docker-image">
                        <option value="php:8.2-fpm-alpine">php:8.2-fpm-alpine</option>
                        <option value="php:8.2-cli-alpine">php:8.2-cli-alpine</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label class="form-label">Include in Image</label>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="mysql" id="chkMysql">--}}
{{--                        <label class="form-check-label" for="chkMysql">mysql</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="pgsql" id="chkPgsql">--}}
{{--                        <label class="form-check-label" for="chkPgsql">pgsql</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="composer" id="chkComposer">--}}
{{--                        <label class="form-check-label" for="chkComposer">composer</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="mcrypt" id="chkMcrypt">--}}
{{--                        <label class="form-check-label" for="chkMcrypt">mcrypt</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="bcmath" id="chkBcmath">--}}
{{--                        <label class="form-check-label" for="chkBcmath">bcmath</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="sockets" id="chkSockets">--}}
{{--                        <label class="form-check-label" for="chkSockets">sockets</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="intl" id="chkIntl">--}}
{{--                        <label class="form-check-label" for="chkIntl">intl</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="opcache" id="chkOpcache">--}}
{{--                        <label class="form-check-label" for="chkOpcache">opcache</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="amqp" id="chkAmqp">--}}
{{--                        <label class="form-check-label" for="chkAmqp">amqp</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="zip" id="chkZip">--}}
{{--                        <label class="form-check-label" for="chkZip">zip</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="redis" id="chkRedis">--}}
{{--                        <label class="form-check-label" for="chkRedis">redis</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="pdo" id="chkPdo">--}}
{{--                        <label class="form-check-label" for="chkPdo">pdo</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <input class="form-check-input" type="checkbox" value="pcntl" id="chkPcntl">--}}
{{--                        <label class="form-check-label" for="chkPcntl">pcntl</label>--}}
{{--                    </div>--}}
{{--                    <div class="form-check">--}}
{{--                        <!-- Add more checkboxes as needed -->--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="mb-3">
                    <label for="selectedOptions" class="form-label">Include in Image (Multiple Select)</label>
                    <select multiple class="form-select" id="selectedOptions" name="options[]">
                        <option value="mysql">mysql</option>
                        <option value="pgsql">pgsql</option>
                        <option value="composer">composer</option>
                        <option value="mcrypt">mcrypt</option>
                        <option value="bcmath">bcmath</option>
                        <option value="sockets">sockets</option>
                        <option value="intl">intl</option>
                        <option value="opcache">opcache</option>
                        <option value="amqp">amqp</option>
                        <option value="zip">zip</option>
                        <option value="redis">redis</option>
                        <option value="pdo">pdo</option>
                        <option value="pcntl">pcntl</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Build</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Build Result</h3>
            <textarea class="form-control result-textarea" id="buildResult" rows="5" readonly></textarea>
        </div>
    </div>
</div>

<script>
    async function postData(url = "", data = {}) {
        // Default options are marked with *
        const response = await fetch(url, {
            method: "POST", // *GET, POST, PUT, DELETE, etc.
            mode: "cors", // no-cors, *cors, same-origin
            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
            credentials: "same-origin", // include, *same-origin, omit
            headers: {
                "Content-Type": "application/json",
                // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            redirect: "follow", // manual, *follow, error
            referrerPolicy: "no-referrer", // no-referrer, *client
            body: JSON.stringify(data), // body data type must match "Content-Type" header
        });
        return await response.json(); // parses JSON response into native JavaScript objects
    }

    document.getElementById("btnBuild").addEventListener("click", function () {
        // Placeholder for build logic
        const resultTextarea = document.getElementById("buildResult");
        resultTextarea.value = "Build result will be displayed here.";

        let formEl = document.getElementById("formSettings");
        let formData = new FormData(formEl);

        postData('/api/v1/make/dockerfile', formData)
            .then(data => {
                console.log(data); // JSON data parsed by `data.json()` call
            });
    });

    // document.getElementById("btnBuild").addEventListener("click", function () {
    //     // Placeholder for build logic
    //     const resultTextarea = document.getElementById("buildResult");
    //     resultTextarea.value = "Build result will be displayed here.";
    //
    //     fetch('/api/v1/make/dockerfile')
    //         .then(response => response.json())
    //         .then(data => {
    //             console.log(data);
    //         })
    //         .catch(error => console.error('Error load resources:', error));
    // });


</script>
</body>
</html>
