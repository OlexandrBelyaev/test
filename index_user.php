<?php 
session_start();
$h=$_GET['v'];													//перевірка на авторизованість
if ($_SESSION['user_id']!=$h){
	header('Location: login.php');
	session_destroy();
}
?>
<style>
tr{
	border: 1px solid black;
}
th{
	border: 1px solid black;
	width:10%;
}
input{
	text-align:center;
	width:100%;
}
.btn{
	width:7%;
	border: 1px solid green; 
	background-color:lightgreen;
	padding:10px;
	margin-top:5px;
}
a{
	text-decoration:none;
	color:black;
}
</style>
<?php

$conn = new mysqli("vatra", "root","", "users");					//підключення до БД
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `blacklist`";									//підготовка даних до публікації
$result = $conn->query($sql);

if ($result->num_rows > 0) {										//публікація даних у таблиці, що вибудовується
    echo "<table style='border: 1px solid black;align:center;' align='center' cellspacing='0px'>";
	echo "<tr id='test' style='background-color:orange;'><th>ID</th><th>Призвище</th><th>Ім`я</th><th>Номер телефону</th></tr>";
	$inc=0;
    while($row = $result->fetch_assoc()) {
        $inc++;
		echo "<tr style='background-color:lightgreen;'><th id=".$inc.">".$row['id']."</th><th>".$row['surname']."</th><th>".$row['name']."</th><th>".$row['phone_number']."</th></tr>'";
	}
	echo "</table><br/>";
}
echo "<p align='center'><a href='logout.php'>Вийти</a></p>";		//вийти з облікового запису