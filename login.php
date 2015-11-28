<?php
	if (isset($_POST["sub"])) {
		include "conn.php";

		$sql="select id from users where name ='{$_POST["name"]}' and password = '{$_POST["password"]}' ";
		$result = $mysqli->query($sql);

		if($result->num_rows > 0){
			$row=$result->fetch_assoc();
			$time=time()+60*60*24*7;
			setcookie("username", $_POST["name"],$time);
			setcookie("uid",$row["id"], $time);
			setcookie("isLogin", 1, $time);

			header("Location:index.php");

		}
		echo "用户名密码有误 <br>";

	}

?>
<html>
	<head>
		<title>用户登录</title>
	</head>
	<body>
		<form action="login.php" method="post">
		<table align="center" border="1" width="300">
			<caption><h1>用户登录</h1></caption>
			<tr>
				<th>用户名</th>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<th>密 码</th>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				
				<td colspan="2" align="center">
					<input type="submit" name="sub" value="登 录">
				</td>
			</tr>
		</table>
		</form>
	</body>
</html>