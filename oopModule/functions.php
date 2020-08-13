<?php

function encrypt ($password){
    $hashed = md5($password);

    return $hashed;
}
?>