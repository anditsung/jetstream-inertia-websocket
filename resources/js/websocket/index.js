window.debug = false;

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
    if (debug) console.log("||| SEND MESSAGE -> " + message + " |||")
    websocket.send(message)
}

function onOpen(event) {
    registerWebsocket()
}

function onMessage(event) {
    event = JSON.parse(event.data)
    var eventName = event.event
    switch (eventName) {
        case 'pusher:connection_established':
            if (debug) console.log("||| CONNECTED |||")
            sendActivity(event.data)
            break;

        case 'pusher_internal:subscription_succeeded':
            if (debug) console.log("||| CONNECTED TO CHANNEL " + event.channel + " |||")
            break;

        case 'pusher:pong':
            if (debug) console.log("||| RECEIVE PONG |||")
            break;

        case listen:
            if (debug) console.log("||| RECEIVE DATA -> " + event.data + " |||")
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
    if (debug) console.log(event)
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
    setInterval(function () {
        var message = {
            event: "pusher:ping"
        }
        if (debug) console.log("||| SEND PING |||")
        sendMessage(message)
    }, data.activity_timeout * 1000)
}
