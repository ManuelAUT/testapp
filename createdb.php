<?php

    $host = 'direktdb.database.windows.net';
    $username = 'student';
    $password = 'asdf1234.';
    $db_name = 'Products';

    //Establishes the connection
    $conn = mysqli_init();
    mysqli_real_connect($conn, $host, $username, $password, $db_name, 1433);
    if (mysqli_connect_errno($conn)) {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
        }
        
    // Run the create table query
    if (mysqli_query($conn, '
        CREATE TABLE Products (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `bezeichnung` VARCHAR(30) NOT NULL ,
        `langbeschreibung ` VARCHAR(256) NOT NULL ,
        `thumbnail` VARCHAR(256) NOT NULL ,
        `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
        PRIMARY KEY (`Id`)
        );
    '))
    
    //Close the connection
    mysqli_close($conn);
?>