<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3c.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3c.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<title> STRUGGLE </title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
		<style>
			body {
				background-image: url(tlo.jpg);
				background-repeat: no-repeat;
				background-size: cover;
			}
			#logowanie {
				width: 30%;
				height: 30%;
				background-color: #CEF4FD;
				position: absolute;
				left: 35%;
				top: 30%;
				
			}
		</style>
		
	</head>
	<body >
		<div style="border-style: outset; border-color: #045B71" id="logowanie">
			
			<center><br /><b><font size="5">REJESTRACJA!</font></b><br /><br />
                <?php 
session_start(); // rozpoczynamy sesję 
ob_start();

/* łączenie z bazą danych - start */
$db = mysql_connect("localhost", "root", "");
if (!$db) {
    die('Nie można połączyć: ' . mysql_error());
}

mysql_select_db ("users");
?>
                <form method="post">
                <table>
                    <tr>
                        <td>Login:</td>
                        <td>
                            <input class="pole" type="text" name="login" value="">
                        </td>
                    </tr> 
                    <tr>
                        <td>E-mail:</td>
                        <td>
                            <input class="pole" type="text" name="email" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Hasło:</td>
                        <td><input class="pole" type="password" name="password" value=""></td>
                    </tr>
                    <tr>
                        <td>Powtórz hasło:</td>
                        <td>
                            <input class="pole" type="password" name="password2" value="">
                        </td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td>
                            <input type="submit" name="submit" class="button" value="Zarejestruj" />
                        </td>
                    </tr>
                </table>
                </form>

<?php

if (isset($_POST['submit']))
{
if(!$_POST['login'] || !$_POST['password'] || !$_POST['password2'] || !$_POST['email']) // sprawdzamy czy wszystkie pola zostały wypełnione...
{
echo 'Nie wypełniono wszystkich pól!'; // jeżeli nie to wywala komunikat...
}
/* jeżeli tak, to dodaje użytkownika do bazy danych */
else {
if ($_POST['password']==$_POST['password2']) // sprawdza czy hasła zgadzają się
  {
    $user = mysql_real_escape_string (trim($_POST['login']));
    $email = $_POST['email'];
    $pass = sha1(mysql_real_escape_string (trim($_POST['password'])));
    $zapytanie = "INSERT INTO `user` (`login`,`email`,`haslo`)
                    VALUES ('$user','$email','$pass')";
    mysql_query($zapytanie) or die("Wystąpił błąd" );
        echo('Konto <strong><i>'.$user.'</i></strong> zostało utworzone!<br/><a href="index.php">Zaloguj się</a>');     
  }
  else echo ('Podane hasła różnią się.');
}
}
?>
<?php 
ob_end_flush(); 
?>
</div>
			</center>
	</body>
</html>