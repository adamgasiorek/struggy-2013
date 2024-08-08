<html>
	<head>
		<style>
			html, body {
				background-image: url(dupa.jpg);
				background-repeat: no-repeat;
				background-size: 100% 100%;
				min-height: 100%;
				
				
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
	<body>
		<div style="border-style: outset; border-color: #045B71" id="logowanie">
			
			<center><br /><b><font size="5">WITAM! Zaloguj sie albo zarejestruj!</font></b><br /><br />
                <table><form method="post" >
                
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
if (isset($_POST['login'])) {
	$_SESSION['varname'] = $_POST['login'];
}


$db = mysql_connect("localhost", "root", "");
if (!$db) {
    die('Nie można połączyć: ' . mysql_error());
}

mysql_select_db ("users");



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
    header('Location: ladowanie.html');
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