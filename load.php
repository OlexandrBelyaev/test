<?php
class Project {
  public $name;
  public $id;
  public $tasks;
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
  function set_id() {
    $this->id = rand(1,1000000);
  }
  function get_id() {
    return $this->id;
  }
  function add_task($tasks) {
    $this->tasks[] = array($tasks, rand(1,1000000), true);
  }
  function drop_task(){
	  $q=$_REQUEST['q'];
	  $this->tasks=array_splice($proj1->tasks,$q,1);
  }
}
$file=fopen('memory.txt','r');
$i=0;
while(!feof($file)){
	$project_array[]=fgets($file);
	if ($project_array[$i]==""){unset($project_array[$i]);};
	$i++;
}
fclose($file);
print_r(json_encode($project_array));
?>