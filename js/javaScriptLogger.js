"use strict";

var logErrors = function (errorMessage, errorUrl, errorLine) {
    var errorString = {},
        errorAJAX = new XMLHttpRequest();

    errorString.error = errorMessage;
    errorString.url = errorUrl;
    errorString.line = errorLine;

    errorAJAX.open("post", "example.php", true);
    errorAJAX.setRequestHeader("Content-type", "application/json");
    errorAJAX.send(JSON.stringify(errorString));
};

window.onerror = logErrors;