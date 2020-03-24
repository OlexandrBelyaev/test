<?php
session_start();									//початок сесії
$login=$_POST['log'];
$password=$_POST['pass'];
$conn = new mysqli("vatra", "root","", "users");	//підключення до БД користувачів
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'";		//запит на введені логін і пароль
$result = $conn->query($sql);
if ($result->num_rows > 0) {						//обробка результатів
    while($row = $result->fetch_assoc()) {
        if(($row['login']==$login)&&($row['password']==$password)){						//якщо логін і пароль співпадають, то зазначаються дані користувача у сесії
			$_SESSION['user_id'] = $row['id'];											//інакше користувача перенаправляє на форму авторизації
			if ($row['admin']==0){header('Location: index_user.php?v='.$row['id']);break;} else {header('Location: index.php?v='.$row['id']);break;}	
													//якщо користувач не є адміністратором, його направляють на сторінку без можливості редагування
													//інакше на сторінку з можливостями додавання, редагування і видалення записів
		}
	}
}
else{header('Location: php25/index.php');}