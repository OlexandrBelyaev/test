<?php
$q = $_REQUEST['name'];
$q1= $_REQUEST['q'];
for ($i=1;$i<strlen($q);$i++){
	$r.=$q[$i];
}
$i=0;
$file=fopen('memory.txt','r');
while(!feof($file)){
	$a=fgets($file);
	if (json_decode($a)->id!=$_REQUEST['name']){
	$project_array[$i]=$a;}else{$b=json_decode($a);$b->set_name($q1);$project_array[$i]=json_encode($b);}
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
fclose($file);