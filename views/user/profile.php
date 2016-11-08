<?php if (isset($data['mail'])) : ?>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-8">
                <label>Wohnort: <?= $data['ort'] . ' ' . $data['land'] ?></label>
            </div>
            <div class="col-xs-4">
                <label>Profilbild</label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div id="map-canvas"></div>
            </div>
            <div class="col-xs-4">
                <img src="<?= DIR ?>static/img/<?= $data['mail']?>.jpg" alt="Profilbild">
            </div>
        </div>
    </div>
</div>

<?php endif; ?>