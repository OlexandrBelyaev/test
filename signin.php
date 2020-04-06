<?php
session_start();																		//початок сесії
try{									
$login=$_POST['log'];
$password=$_POST['pass'];	
$servername="vatra";
$dbname="users";
$username="root";
try{
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");				//підключення до БД користувачів
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password'");		//запит на введені логін і пароль
$stmt->execute();	
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
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
catch(PDOException $er) {
    echo "Error: " . $er->getMessage();
}
else{header('Location: php25/index.php');}
}
catch (Exception $e){echo "Error ".$e;}