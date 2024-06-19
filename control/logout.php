<?php

session_start();

unset($_SESSION["nis"]);
session_destroy();
echo "
    <script type='text/javascript'>
    alert('Anda telah logout')
    window.location = '../';
    </script>
    ";