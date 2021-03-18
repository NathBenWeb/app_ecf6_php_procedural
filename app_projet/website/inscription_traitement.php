<?php

if(isset($_POST["soumis"])){
        extract($_POST);

        echo "$login, $pass, $message";
}
?>