<div class="row">
    <div class="col-md-4">
        <form role="form" action="<?= DIR ?>user/login" method="POST">
            <div class="row">
                <div class="col-xs-12">
                    <label>Mail</label>
                    <input class="form-control" type="email" name="mail" placeholder="E-Mail eingben">
                </div>
            </div>
            <label>Passwort</label>
            <div class="row">
                <div class="col-xs-8">
                    <input class="form-control" type="password" name="password" placeholder="Passwort eingeben">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-block btn-primary">Login</button>  
                </div>
            </div>
        </form> 
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-7">
        <form role="form" action="<?= DIR ?>user/signup" method="POST">
            <div class="row">
                <div class="col-xs-6">
                    <label>Passwort</label>
                </div>
                <div class="col-xs-6">
                    <label>Passwort wiederholen</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <input class="form-control" type="password" name="password" placeholder="Passwort eingeben">
                </div>
                <div class="col-xs-6">
                    <input type="password" class="form-control" name="password2" placeholder="Passwort eingeben">
                </div>
            </div>
            <label>Mail</label>
            <div class="row">
                <div class="col-xs-8">
                    <input class="form-control" type="email" name="mail" placeholder="E-Mail eingeben">
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-block btn-primary">Registrieren</button>  
                </div>
            </div>
        </form>  
    </div>
</div>
