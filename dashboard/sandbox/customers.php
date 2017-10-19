<?php 
$customers = $client->customers()->list()->records;
print_r($customers);
?>