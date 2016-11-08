<?php 
    
    if (isset($data['name'], $data['ort'], $data['land'])) :
?>

<div class="row">
    <div class="col-md-12">
        <form role="form" action="<?= DIR ?>user/add/<?= $data['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-3">
                    <label>Benutzername</label>
                </div>
                <div class="col-xs-4">
                    <label>Wohnort</label>
                </div>
                <div class="col-xs-3">
                    <label>Land</label>
                </div>
                <div class="col-xs-2">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <input class="form-control" type="text" name="name" placeholder="Name eingeben" value="<?= $data['name'] ?>">
                </div>
                <div class="col-xs-4">
                    <input class="form-control" type="text" name="ort" placeholder="Ort eingeben" value="<?= $data['ort'] ?>"> 
                </div>
                <div class="col-xs-3">
                    <input class="form-control" type="text" name="land" placeholder="Land eingeben" value="<?= $data['land'] ?>"> 
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-block btn-primary">Speichern</button> 
                </div>
            </div>
            
            <label>Profilbild</label>
            <div class="row">
                <div class="col-xs-8">
                    <input  type="file" name="file">
                </div>
                <div class="col-xs-4 text-right">
                     Alle Felder müssen algefüllt sein.
                </div>
            </div>
        </form> 
    </div>
</div>

<?php else : ?>

<div class="row">
    <div class="col-md-12">
        <form role="form" action="<?= DIR ?>user/add/<?= Session::get('user')['id'] ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-3">
                    <label>Benutzername</label>
                </div>
                <div class="col-xs-4">
                    <label>Wohnort</label>
                </div>
                <div class="col-xs-3">
                    <label>Land</label>
                </div>
                <div class="col-xs-2">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                    <input class="form-control" type="text" name="name" placeholder="Name eingeben">
                </div>
                <div class="col-xs-4">
                    <input class="form-control" type="text" name="ort" placeholder="Ort eingeben"> 
                </div>
                <div class="col-xs-3">
                    <input class="form-control" type="text" name="land" placeholder="Land eingeben"> 
                </div>
                <div class="col-xs-2">
                    <button type="submit" class="btn btn-block btn-primary">Speichern</button> 
                </div>
            </div>
            
            <label>Profilbild</label>
            <div class="row">
                <div class="col-xs-8">
                    <input  type="file" name="file">
                </div>
                <div class="col-xs-4 text-right">
                     Alle Felder müssen algefüllt sein.
                </div>
            </div>
        </form> 
    </div>
</div>

<?php endif; ?>
