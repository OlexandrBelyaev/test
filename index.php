<?php session_start();?>
<h2>Projects by user <?php echo $_SESSION['user_id'];?></h2>
<input type="text" id="txt"/>
<button type="button" onclick="loadDoc()">View projects</button>
<button type="button" onclick="createproject()">Create project</button>
<div id="demo">
</div>
<div id="hide" style="display:none">
</div>
<script>
function createproject() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      loadDoc();
    }
  };
  xhttp.open("GET", "createProject.php?q="+document.getElementById("txt").value, true);
  xhttp.send();
}
function loadDoc(){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var t = JSON.parse(this.responseText);
	  document.getElementById("hide").innerHTML=t;
	  document.getElementById("demo").innerHTML="";
	  var l = t.length;
	  for (i=0;i<l;i++){
		  var a = JSON.parse(t[i]);
		  var len=a.tasks.length;
		  document.getElementById("demo").innerHTML+="<h2>Project name: "+a.name+"</h2>"+"<h3>Project ID: "+a.id+"</h3>"+"<h3>Count of tasks: "+len+"</h3>";
		  document.getElementById("demo").innerHTML+="<input type='text' id="+"d"+a.name+"><button onclick='renameProject1(this.id)' id="+a.name+">Rename project</button>";
		  document.getElementById("demo").innerHTML+="<br/><button onclick='deleteProject1(this.id)' id="+a.id+">Delete project</button><hr/>";
		  for (z=0;z<len;z++){
			  document.getElementById("demo").innerHTML+="<h4><p>Task name: "+a.tasks[z][0]+"</p><p>Deadline: "+a.tasks[z][1]+"</p><p>ID: "+a.tasks[z][2]+"</p><p id="+a.tasks[z][3]+">Done: "+a.tasks[z][3]+"</p></h4>";
			  document.getElementById("demo").innerHTML+="<button onclick='deleteTask("+a.tasks[z][3]+")'>Delete task</button>";
		  }
		  document.getElementById("demo").innerHTML+="<hr/>";
		}
    }
  };
  xhttp.open("GET", "load.php?q="+document.getElementById("txt").value, true);
  xhttp.send();
}
function deleteProject1(str){
	var a = JSON.stringify(document.getElementById("hide").innerHTML);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		loadDoc();
    }
};
	xhttp.open("GET", "delete1.php?q="+document.getElementById('hide').innerHTML+"&name="+str, true);
	xhttp.send();
}
function renameProject1(str){
	var a = JSON.stringify(document.getElementById("hide").innerHTML);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		loadDoc();
    }
};
	var strd="d"+str;
	xhttp.open("GET", "renameProject.php?name="+str+"&q="+document.getElementById(strd).value, true);
	xhttp.send();
}
function deleteTask(task){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      loadDoc();
    }
  };
  xhttp.open("GET", "deleteTask.php?q="+task, true);
  xhttp.send();
}
</script>