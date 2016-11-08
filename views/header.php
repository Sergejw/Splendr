<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $data['title'] . ' - ' . SITETITLE ?></title>
    <link rel="stylesheet" href="<?= URL::STYLES('bootstrap.min') ?>">
    <link rel="stylesheet" href="<?= URL::STYLES('style') ?>">
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKSe806OFN8rYPGnl0t4hWJ7UWYh_-vUY"></script>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(<?= $data['lat']?>, <?= $data['lng']?>),
                zoom: 11,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(mapCanvas, mapOptions)
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= DIR ?>">Splendr</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= DIR ?>">Produktübersicht</a></li>
                    <li><a href="<?= DIR ?>products/tags">Schlagwörter</a></li>
                    <li><a href="<?= DIR ?>products/add">Produkt anlegen</a></li>
                    
                    <?php if (isset(Session::get('user')['id'])) : ?>
                    
                        <li><a href="<?= DIR ?>user/profile/<?= Session::get('user')['id']?>">Profil</a></li>
                        <li><a href="<?= DIR ?>user/edit/<?= Session::get('user')['id']?>">Profil bearbeiten</a></li>
                        <li><a href="<?= DIR ?>user/logout">Abmelden</a></li>
                        
                    <?php else : ?>
                        
                        <li><a href="<?= DIR ?>user/input">Login / Registrieren</a></li>
                        
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-xs-8">
                    <h2 class="pull-left"> <?= $data['title']?> </h2>
                </div>
                <div class="col-xs-4">
                    <form class="navbar-form navbar-right form-search" role="search" action="<?= DIR ?>products/search" method="GET">
                       <div class="form-group">
                          <div class="input-group">
                             <input class="form-control" type="search" name="q" placeholder="Suchbegriff">
                             <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">Suchen</button>
                             </span>
                          </div>
                       </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-right: 27px">

        <?php echo Message::show(); ?>
