<?php
    // connection
    // $conn = mysqli_connect('localhost','root','','tvoutlet');
    $conn = mysqli_connect('localhost','root','','id15962532_tvoutlet');
    //check connection
    if (mysqli_connect_errno()){
        echo 'Failed to connect baby'. mysqli_connect_errno();
    } 