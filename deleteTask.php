<?php
$q=$_REQUEST['q'];
$i=0;
$file=fopen('memory.txt','r');
while (!feof($file)){
	$a=fgets($file);
	$len=count(json_decode($a)->tasks);
	for ($i=0;$i<$len;$i++){
		$b=json_decode($a);
		if ($b->tasks[$i][3]==$q){
			unset($b->tasks[$i]);
		}
	}
	$project_array[$i]=json_encode($b);
	$i++;
}
fclose($file);
$file=fopen('memory.txt','w');
for ($j=0;$j<$i;$j++){
	fwrite($file, $project_array[$j]."\n");
}
fclose($file);