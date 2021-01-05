<?php
    // connection
    $conn = mysqli_connect('localhost','root','','tvoutlet');
    //check connection
    if (mysqli_connect_errno()){
        echo 'Failed to connect baby'. mysqli_connect_errno();
    } 