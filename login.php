<html>
<head>
<style>
.grid-container {
	display: grid;
	grid-template-columns: auto auto auto;
	background-color: orange;
	padding: 10px;
	height:96.75vh;
}
body{
	margin:0;
}
.grid-item {
	background-color: lightgreen;
	border: 1px solid lightgreen;
	padding: 2vh;
	font-size: 1.15em;
	text-align: center;
}
.ib{
	margin: 8px;
}
form{
	background-color:white;
	border-radius: 2.5%;
	border: 1px solid orange;
	padding-top: 5%;
	padding-bottom: 5%;
	}
</style>
</head>
<body>
	<div class="grid-container">
		<div class="grid-item">
		</div>

	<div class="grid-item">
		<h1>Login</h1><br/>
		<form action="signin.php" method="POST">								
			Логін<br/><input type="text" name="log"/><br/>
			Пароль<br/><input type="password" name="pass"/><br/>
			<input type="submit" value="Увійти" text="Увійти" class="ib"/>
		</form>
	</div>
	<div class="grid-item">
	</div>
</body>
</html>