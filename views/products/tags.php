<div class="row ">

    <?php
        if (!sizeof($data['tags'])) {
            echo '<div class="alert alert-info">Derzeit gibt es keine Produkte. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
        }
        else {
            foreach ($data['tags'] as $value) {
                echo '<div style="float: left; margin-left: 12px; padding: 5px;">
                <a href="'. DIR .'products/search?q='. $value .'" title="">' . $value . '</a></div>';
            }
        }
    ?>

</div> <!-- / .products -->