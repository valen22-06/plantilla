<?php
include_once '../Lib/helpers.php';
include_once '../View/partials/header.php';
    echo"<body>";
        echo "<div class ='wrapper'>";
            include_once '../view/partials/sidebar.php';
            echo"<div class ='main-panel'>";
                include_once '../view/partials/navbar.php';
                    echo"<div class ='container'>";
                        echo"<div class='page-inner'>";
                            if(isset($_GET['modulo'])){
                                resolve();
                            }else{
                                include_once '../view/partials/content.php';
                            }

                            if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 'ok') {
                                redirect("login2.php");
                                exit;
                            }
                        echo"</div>";
                    echo"</div>";
                            include_once '../view/partials/footer.php';
            echo"</div>";
        echo "</div>";
        include_once '../view/partials/scripts.php';
    echo"</body>";
    echo"</html>";
?>