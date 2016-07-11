<?php


class SNACKS {


function parseJournal(&$info) {

$file_name = substr($info->getFilename(), strlen("KPI "), -4);
if(!array_key_exists($file_name, $this->container)) $this->container[$file_name] =  array();


$buf = file_get_contents($info->getPathname());

$norm_lines = explode("\n", $buf);
foreach ($norm_lines as $lineNum => $value) {
$attr = explode(';', trim($value));
$dateIndex = array_search("date", $attr, TRUE);

if($lineNum == 0) {
if(!array_key_exists("structure", $this->container[$file_name])) $this->container[$file_name]["structure"] =  $attr;

if(!array_key_exists("content", $this->container[$file_name])) $this->container[$file_name]["content"] =  array();

if(!array_key_exists("analyse", $this->container[$file_name])) $this->container[$file_name]["analyse"] =  array();

}
else if($value) {
$this->container[$file_name]["content"] []= $attr;
$month = date_create_from_format('Y-m-d', $attr[$dateIndex])->format('Y-M');

if(!array_key_exists($month, $this->container[$file_name]["analyse"])) {
$this->container[$file_name]["analyse"][$month] =  array(floatval(str_replace(',', '.', str_replace('.', '', $attr[1]))), floatval(str_replace(',', '.', str_replace('.', '', $attr[2]))));

}
else {
$this->container[$file_name]["analyse"][$month][0] += floatval(str_replace(',', '.', str_replace('.', '', $attr[1])));
$this->container[$file_name]["analyse"][$month][1] += floatval(str_replace(',', '.', str_replace('.', '', $attr[2])));

}

}


}


echo "\n";
$this->reportJournal($file_name);



}

function __construct() {
$folder = "six_snacks";

if(!property_exists($this, 'container')) $this->container = array();

foreach (new DirectoryIterator($folder) as $fileInfo) {

    if ($fileInfo->isFile()) $this->parseJournal($fileInfo);

}

}

function reportJournal($file_name) {
$repo = $this->container[$file_name];

$dateIndex = array_search("date", $this->container[$file_name]["structure"], TRUE);
if($dateIndex === false) return;

$newestEntry = 0;
$newestDate = date_create_from_format('Y-m-d', $this->container[$file_name]["content"][$newestEntry][$dateIndex]);

foreach ($this->container[$file_name]["content"] as $index => $attr) {
$date = date_create_from_format('Y-m-d', $attr[$dateIndex]);
if($date > $newestDate) $newestEntry = $index;


}


$str = "<pre>the newest entry for KPI " . $file_name . "\n"; 

foreach ($this->container[$file_name]["structure"] as $i => $struct) {
//if($i<2)continue;
//$struct=$this->container[$file_name]["structure"][2];
$str .= $struct . "\t: " . $this->container[$file_name]["content"][$newestEntry][$i]  . "\n";

}
$str .= "analyse for each month of "  . $file_name . "\n";
$str .= "month name\t: " . $this->container[$file_name]["structure"][1]  ."\t" . $this->container[$file_name]["structure"][2] . "\n";

foreach ($this->container[$file_name]["analyse"] as $i => $struct) {

$str .= $i . "\t: " . $struct[0] ."\t". $struct[1] . "\n";

}

//var_dump($this->container[$file_name]["analyse"]);
//print_r($this->container[$file_name]["analyse"]);
echo str_replace(array("\r", "\n"), '<br>', $str) . "</pre>";
//exit();

}


}


$sixSnacks = new SNACKS();
?>