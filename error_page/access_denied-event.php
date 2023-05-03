<?php
$reason = $args['reason'];
?>


<div class="fofo_wrap layer_wrapper">


    <!--404 Page Title-->
    <div class="page_tt">
        <div class="center">
            <div class="fourofour">

            </div>
            <h2 class="postitle">Du hast keinen Zugriff auf diese Veranstaltung!</h2>
        </div>
    </div>

    <!--404 Description-->
    <div id="content">
        <div class="center">
            <div class="single_wrap no_sidebar">
                <div class="single_post">
                    <div id="content_wrap" class="error_page">
                        <div class="post">
                            <div class="error_msg">
                                <?php
                                switch ($reason) {
                                    case "not-logged-in":
                                        echo "<p>Melde dich an, um auf diese Veranstaltung zuzugreifen</p>";
                                        break;
                                    case "insufficient-role":
                                        echo "<p>Dein Account hat nicht die nötigen Rechte";
                                        break;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
