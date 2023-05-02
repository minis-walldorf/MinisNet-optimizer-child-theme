<?php
$reason = $args['reason'];
?>
<div>
    <h3>Du hast keinen Zugriff auf diese Veranstaltung</h3>
    <?php
    switch ($reason){
        case "not-logged-in":
            echo "<h5>Melde dich an, um auf diese Veranstaltung zuzugreifen</h5>";
            break;
        case "insufficient-role":
            echo "<h5>Dein Account hat nicht die nötigen Rechte";
            break;
    }
    ?>
</div>

