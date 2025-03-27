<?php

    if( $_POST ){

        //echo "<pre>"; print_r($_POST); echo "</pre>";
        //die();
        /*
            Array
            (
                [token1] => token_tres
                [token2] => token_cuatro
            )            
        */

        //echo "El valor del token1 es: ".$_POST["token1"]."<br>El valor del token2 es: ".$_POST["token2"].".";

        echo '  <div class="modal fade" id="modalNuevaEval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row modal-body">
                            <div class="col"><input type="text" class="form-control" id="inputPrueba" value=""></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                </div>
            ';
        
        //  CÓDIGO JS

        echo '<script>
                
                    $("#modalNuevaEval").modal("show");

            ';

    }