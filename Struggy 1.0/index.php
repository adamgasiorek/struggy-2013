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
			
			<center><br /><b><font size="5">WITAM! Zaloguj sie albo zarejestruj!</font></b><br /><br />
                <table><form method="post" action="home.php">
                
                    <tr>
                        <td>Login:</td>
                        <td>
                            <input class="pole" type="text" name="login">
                        </td>
                    </tr> 
                    <tr>
                        <td>Hasło:</td>
                        <td>
                            <input class="pole" type="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td>               
                        </td>
                        <td>       
                        	<input type="submit" name="submit" class="button" value="Zaloguj" />                    

                        </td>
                        <tr>
                        	<td></td>
                        	
                        	</form>
                        <td>
                        	<button name="register" style="width: 100px"><a style="text-decoration: none;" href="register.php"><font color="black">Zarejestruj się!</font></a></button>
                        </td>
                        </tr>
                        
                    </tr>
                    
                </table>
                
                
<?php

session_start(); 
ob_start();

$db = mysql_connect("mysql5.000webhost.com", "a3082820_adam", "adamus1");
if (!$db) {
    die('Nie można połączyć: ' . mysql_error());
}

mysql_select_db ("a3082820_users");



if (isset($_POST['login']) and isset($_POST['password']))
{
if(!$_POST['login'] || !$_POST['password'] ) 
{
    echo 'Nie podano loginu lub hasła!'; 
}

    
else {
    $user = mysql_real_escape_string(trim($_POST['login']));
    $pass = mysql_real_escape_string(trim($_POST['password']));
    $pass = sha1($pass);
    $zapytanie = "SELECT * FROM user WHERE login='$user' and haslo ='$pass'";
    $zapytanie1 = mysql_query($zapytanie) or die("Wystąpił błąd!");
    $ile = mysql_num_rows($zapytanie1);
    $zapytanie1 = mysql_fetch_array($zapytanie1);
    $id = $zapytanie1['id'];
   if ($ile==1)
   {
    $_SESSION['user_id']=$id;
    $_SESSION['login']=$user;
    
    echo('Poprawnie zalogowano!');
    header('Location: home.php');
   }
   
   else { echo ('Podano nieprawidłowe dane!'); }
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