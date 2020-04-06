<?php
try {
$q=$_REQUEST['q'];
$i=0;
$file=fopen('memory.txt','r');
while(!feof($file)){
	$a=fgets($file);
	if (json_decode($a)->id!=$_REQUEST['name']){
	$project_array[$i]=$a;}
	if ($project_array[$i]==""){array_splice($project_array,$i,1);};
	$i++;
}
fclose($file);
print_r($project_array);
$file=fopen('memory.txt','w');
for ($j=0;$j<$i;$j++){
	if ($project_array[$j]!=""){
	fwrite($file,$project_array[$j]);}
}
fclose($file);}catch (Exception $e){echo "Error ".$e;}