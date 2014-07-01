"use strict";
/**
 * Sends the error to the server via AJAX.
 *
 * Based on the window onerror trigger, this sends the JS error message to the server via AJAX as JSON.
 *
 * @author Robert Gump
 * @version 0.5.1
 */
var logErrors = function (errorMessage, errorUrl, errorLine) {
    var errorAJAX = new XMLHttpRequest(),
        errorString = {
            error: errorMessage,
            url: errorUrl,
            line: errorLine
        };

    errorAJAX.open("post", "example.php", true);
    errorAJAX.setRequestHeader("Content-type", "application/json");
    errorAJAX.send(JSON.stringify(errorString));
};

window.onerror = logErrors;