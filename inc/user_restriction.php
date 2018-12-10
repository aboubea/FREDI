<?php
if (isset($_SESSION['mail_resp_leg'])){
    header('Location: espace_resp_leg.php');
}elseif(isset($_SESSION['mail_inscrit'])){
    header('Location: espace_adh.php');
}elseif(isset($_SESSION['mail_resp_crib'])){
    header('Location: espace_resp_crib.php');
}elseif(isset($_SESSION['mail_tresorier'])){
    header('Location: espace_tresorier.php');
}
?>