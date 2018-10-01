<?php
    session_start();
    print_r($_SESSION);
    
    // redirect back if not autorized
    if (empty($_SESSION)) {
        header('Location: ./?signup');
    }
?>