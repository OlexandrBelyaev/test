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
    $this->tasks[] = array($tasks, "31/12/2020", true,rand(1,10000000));
  }
  function drop_task($tasks) {
    
  }
}
$q=$_REQUEST['q'];
$proj1 = new Project();
$proj1->set_name($q);
$proj1->set_id();
$proj1->add_task('new task');
$proj1->add_task('new task1');
$txt=json_encode($proj1)."\n";
echo json_encode($proj1);
$file=fopen('memory.txt', 'a+');
fwrite($file,$txt);
fclose($file);
?>