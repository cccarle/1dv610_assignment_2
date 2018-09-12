<?php 


define('DB_HOST', 'localhost');

define('DB_USER', 'root');

define('DB_PASS', '');

define('DB_NAME', 'Auth_1dv610');

// App Root

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', 'http://192.168.64.2/1dv610_assignment_2-master/');
// Site Name
define('SITENAME', 'Auth_1dv610');














// $host = 'localhost';
//         $user = 'root';
//         $password = '';
//         $dbname = 'Auth_1dv610';

//         // Set DSN
//         $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

//         // Create a PDO instance
//         $pdo = new PDO($dsn, $user, $password);
//         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // Fetch data from db as object.

//         // form input from username
//         $nameofuser = $username;

//         /*
//         GET DATA FROM DB
//          */

//         $sql = 'SELECT * FROM users WHERE user_username = :user_username';

//         $stmt = $pdo->prepare($sql);
//         $stmt->execute(['user_username' => $nameofuser]);
//         $users = $stmt->fetchAll();

//         foreach ($users as $user) {
//             echo $user->user_username;
//         }


//         /*
//         ADD DATA TO DB
//          */

//         $name = $username;
//         $hashedPassword = $passwordFromUser;

//         $sql = 'INSERT INTO users(user_username, user_password) VALUES (:user_username, :user_password)';
//         $stmt = $pdo->prepare($sql);
//         $stmt->execute(['user_username' => $name, 'user_password' => $hashedPassword]);

//         echo 'added user';
