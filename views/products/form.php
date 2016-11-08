<?php 
    echo Message::show();
    
    $product = $data['product'];
    if (isset($product['id'])) :
?>

<form role="form" action="<?= DIR ?>products/update" method="POST">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    <label>Produkt-URL</label>
    <input class="form-control" type="url" name="url" placeholder="URL eingeben" value="<?= $product['url'] ?>">
    <label>Produkt-Bild</label>
    <input class="form-control" type="url" name="image" placeholder="URL eingeben" value="<?= $product['image'] ?>">
    <label>Produkt-Schlagwörter</label>
    <input class="form-control" type="text" name="tags" placeholder="Schlagwörter eingeben" value="<?= $product['tags'] ?>">
    <div class="row">
        <div class="col-xs-7">
            <label>Produkt-Name</label>
        </div>
        <div class="col-xs-3">
            <label>Preis in €</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-7">
            <input class="form-control" type="text" name="name" placeholder="Produktname eingben" value="<?= $product['name'] ?>">
        </div>
        <div class="col-xs-3">
            <input type="number" step="0.01" class="form-control" name="price" placeholder="Preis eingeben" value="<?= $product['price'] ?>">
        </div>
        <div class="col-xs-2">
            <button type="submit" class="btn btn-block btn-primary">Aktualisieren</button>
        </div>
    </div>  
</form>

<?php else : ?>

<form role="form" action="<?= DIR ?>products/insert" method="POST">
    <label>Produkt-URL</label>
    <input class="form-control" type="url" name="url" placeholder="URL eingeben">
    <label>Produkt-Bild</label>
    <input class="form-control" type="url" name="image" placeholder="URL eingeben">
    <label>Produkt-Schlagwörter</label>
    <input class="form-control" type="text" name="tags" placeholder="Schlagwörter eingeben">
    <div class="row">
        <div class="col-xs-7">
            <label>Produkt-Name</label>
        </div>
        <div class="col-xs-3">
            <label>Preis in €</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-7">
            <input class="form-control" type="text" name="name" placeholder="Produktname eingben">
        </div>
        <div class="col-xs-3">
            
            <input type="number" step="0.01" class="form-control" name="price" placeholder="Preis eingeben">
        </div>
        <div class="col-xs-2">
            <button type="submit" class="btn btn-block btn-primary">Anlegen</button>  
        </div>
    </div>
</form>

<?php endif; ?>

<p>
    Alle Felder müssen ausgefüllt sein. Mindestens ein Schlagwort.
</p>