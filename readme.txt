notas sistema crud easy ui 

CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `mydb`;
 


PHP Version 7.4.3-4ubuntu2.22 (phpinfo )
mysql version  8.0.37-0ubuntu0.20.04.3 (select VERSION() ver)
linux version Ubuntu 20.04.6 LTS focal fossa (lsb_release -a)
kernel version 6.2.16-3-pve (uname -r)

tested also in windows 10 pro 1803 
XAMPP Version 8.0.30 
mysql version 10.4.32-MariaDB (SELECT VERSION())
PHP Version 8.0.30  (php -version)
PHP 8.0.30 (cli) (built: Sep  1 2023 14:15:38) ( ZTS Visual C++ 2019 x64 )



easyui-crud-using-pdo
After using the following: http://www.jeasyui.com/tutorial/app/crud.php I realized that mysql_* functions are depreciated, so I decided to code the php side files from scratch, and port it to use MySQL PDO instead.

All code is commented, and organized similar to the old MySQL version provided from the link above. You can read their website for their license or whatever. All I did was re-write it to use MySQL PDO instead, and provided better commenting. SQL Table is included.

Zip Download
Extract to /htdocs/whatever
Create a database using MySQL/PhpMyAdmin
Import the sql
Navigate to http://localhost/eu
If you have problems or issues post them here I'll see if I can help you, you should be familiar with PHP, MySQL, jQuery and have a local web server (xampp) to test on.

In regards to editing and making changes just read the code, test, and play around.
includes script bd
scrip for backup the database and the source code 
