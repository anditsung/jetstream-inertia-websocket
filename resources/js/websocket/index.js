window.debug = false

function init_websocket(url) {
    websocket = new WebSocket(url)

    websocket.onopen = function (event) {
        onOpen(event)
    }

    websocket.onmessage = function (event) {
        onMessage(event)
    }

    websocket.onclose = function(event) {
        onClose(event)
    }

    websocket.onerror = function (event) {
        onError(event)
    }
}

function sendMessage(message) {
    message = JSON.stringify(message)
    if (debug) {
        console.log("||| SEND MESSAGE -> " + message + " |||")
        console.log(websocket)
    }
    websocket.send(message)
}

function onOpen(event) {
    registerWebsocket()
}

function onMessage(event) {
    if (debug) console.log("||| RECEIVE MESSAGE |||")
    event = JSON.parse(event.data)
    var eventName = event.event
    switch (eventName) {
        case 'pusher:connection_established':
            if (debug) console.log("||| ESTABLISHED |||")
            sendActivity(event.data)
            break;

        case 'pusher_internal:subscription_succeeded':
            if (debug) console.log("||| CONNECTED TO CHANNEL " + event.channel + " |||")
            break;

        case 'pusher:pong':
            if (debug) console.log("||| PONG |||")
            break;

        case listen:
            if (debug) console.log("||| DATA -> " + event.data + " |||")
            var quoteData = JSON.parse(event.data)
            $('#quote_text').text(quoteData.quote)
            $('#by_text').text(quoteData.by)
            $('#quote_div').show()
            break;

        default:
            if (debug) console.log(event)
    }
}

function onClose(event) {
    var websocketTimer = setInterval(function () {
        switch (websocket.readyState) {
            /*
            jika sudah ada server yang online maka clear timer
             */
            case WebSocket.OPEN:
                if (debug) console.log("||| SERVER ONLINE |||")
                clearInterval(websocketTimer)
                break;

            /*
            retry connection jika terputus dari server
             */
            case WebSocket.CLOSED:
                if (debug) {
                    console.log("||| NO SERVER |||")
                    console.log("||| RETRY |||")
                    console.log(websocket)
                }
                init_websocket(event.target.url)
                break;
        }
    }, 1000)
}

function onError(event) {
    if (debug) console.log(event)
}

function registerWebsocket() {
    var message = {
        event: "pusher:subscribe",
        data: {
            channel: channel
        }
    }
    sendMessage(message)
}

function sendActivity(data) {
    data = JSON.parse(data)
    var pingInterval = setInterval(function () {
        var message = {
            event: "pusher:ping"
        }
        if (debug) console.log("||| SEND PING |||")
        if (websocket.readyState === WebSocket.OPEN) {
            sendMessage(message)
        }
        else {
            if (debug) console.log("||| WEBSOCKET IS CLOSE, CLEARING PING INTERVAL |||")
            clearInterval(pingInterval)
        }
    }, data.activity_timeout * 1000)
}
