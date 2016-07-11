<?php

$query = json_decode($_POST['query'], true);
$obj = array("Wind Turbines" => "service: after every 1000h
money per kwh: 0.2105 €
operating costs: 3500 €/year", "Solarpanel" => "service: after every 2500h
money per kwh: 0.2105 €
operating costs: 1500 €/year");
if (array_key_exists("name", $query)) {
foreach ($obj as $attr => $prop) {
echo $attr . "\n" . $prop . "\n";
}
}
/*
curl -X POST -H "Content-Type: application/json" -d '{
    "id": "987bksd9z8",
    "name": "Solarpanel 1",
    "power": 1.03,
    "hours_of_sunlight": 0.03
}' "http://localhost/lib/git/quiz/test.php"
*/
?>