install beyondcode/laravel-websockets

how to install can be find [here](https://beyondco.de/docs/laravel-websockets/getting-started/installation)

if have this error when installing

```
Problem 1
    - beyondcode/laravel-websockets[1.12.0, ..., 1.x-dev] require guzzlehttp/psr7 ^1.5 -> found guzzlehttp/psr7[1.5.0, ..., 1.x-dev] but the package is fixed to 2.0.0 (lock file version) by a partial update and that version does not match. Make sure you list it as an argument for the update command.
    - Root composer.json requires beyondcode/laravel-websockets ^1.12 -> satisfiable by beyondcode/laravel-websockets[1.12.0, 1.x-dev].
```

add this options on installing

```
composer require beyondcode/laravel-websockets --with-all-dependencies
```

or

```
composer require beyondcode/laravel-websockets -W
```

to make websocket using secure connection please add 
```
LARAVEL_WEBSOCKETS_SSL_LOCAL_CERT="[FILE_LOCATION]"
LARAVEL_WEBSOCKETS_SSL_LOCAL_PK="[FILE_LOCATION]"
```
to .env

it seems we cannot verify the peer, so must add this to websockets config after the passphrase
```
'verify_peer' => env('LARAVEL_WEBSOCKETS_SSL_VERIFY_PEER', false),
```

start websocket server
```
php artisan websocket:serve
```

test websocket using chrome app piesocket

```
ws://[HOSTNAME]:6001/app/[PUSHER_APP_KEY]
SSL => wss://[HOSTNAME]:6001/app/[PUSHER_APP_KEY]
```

on bootstrap.js should look like this
```
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
});
```
