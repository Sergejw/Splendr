<div class="row ">

   <?php
      if (!sizeof($data['products'])) {
         echo '<div class="alert alert-info">Derzeit gibt es keine Produkte. <a href="' . DIR . 'products/add">Leg gleich welche an</a>!</div>';
      }
      else {
         foreach ($data['products'] as $product) {
            echo
            '<div class="item col-xs-4">
               <div class="thumbnail">
                  <a href="' . $product['url'] . '" title="' . $product['name'] . '"><img src="' . $product['image'] . '" alt="' . $product['name'] . '"></a>';
            
            if ($product['owner'] == null || Session::get('mail') == $product['owner']) {
                echo  '<div class="buttons-edit">
                         <a class="btn btn-default btn-sm" href="' . DIR . 'products/edit/' . $product['id'] . '">Bearbeiten</a>
                         <a class="btn btn-default btn-sm" href="' . DIR . 'products/delete/' . $product['id'] . '">Löschen</a>
                      </div>';
            } else {
            echo  '<div class="buttons-edit">
                        <div class="owner">
                            Nur der Eigentümer darf dieses Produkt bearbeiten oder löschen!
                        </div>
                  </div>';
            }
            
            echo  '<div class="caption">
                     <h4><a href="' . $product['url'] . '" title="' . $product['name'] . '">' . $product['name'] . '</a></h4>
                     <span class="lead">' . str_replace(".", ",", $product['price']) . ' €</span>
                  </div>
               </div>
            </div>';
         }
      }
   ?>

</div> <!-- / .products -->