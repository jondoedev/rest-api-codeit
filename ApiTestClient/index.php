<?php
require_once __DIR__.'/Client.php';
use Client\Client as Client;
//Client::fetchAll();
//Client::fetchID(1);
?>

<form action="<?php Client::fetchAll(); ?>">
    <input type="submit"><button type="submit" formaction="<?php Client::fetchAll(); ?>">Fetch All</button>
</form>
