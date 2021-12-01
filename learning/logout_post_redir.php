<?php
    session_start();
    session_destroy();
    header('Location: index_post_redir.php');
?>