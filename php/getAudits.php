<?php

    if($_POST){

        //echo "<pre>"; print_r($_POST); echo"<pre>";
        //die();
        /*
            Array
            (
                [token] => asasdasd
            )
        */

        require_once "../private/conec_sicosa.php";
        require_once "../private/repository_sicosa.php";

        require_once "../private/encriptador.php";

        
        //  CONSULTA PASANDO COMO PARAMETRO EL ID PAF -- PARA EL HISTÓRICO --
        /*
        $sql = "    SELECT ASIC.`ID_AUDITORIA`,AP.`EJERCICIO`, AP.`AUDITORIA_SFP`, AP.`ID_TIPO_AUDITORIA`, AP.`DEPENDENCIA_RECURSO`,AP.`MONTO`,
                        ASIC.`STATUS_AUDITORIA`, ASIC.`MONTO_REVISADO`, ASIC.`MONTO_OBSERVADO`, ASIC.`FECHA_HORA`,
                        CS.`DESCRIPCION_STATUS`, CTA.`DESCRIPCION_TIPO_AUDITORIA`, CAP.`DESCRIPCION_ALINEACION_PAF`
                    
                    FROM `auditorias_sicosa` ASIC 

                    LEFT JOIN `auditorias_paf` AP 
                        ON AP.`AUDITORIA_SFP` = ASIC.`AUDITORIA_SFP` 

                    LEFT JOIN `cat_tipo_auditoria` CTA
                        ON CTA.`ID_TIPO_AUDITORIA` = AP.`ID_TIPO_AUDITORIA`

                    LEFT JOIN `cat_status` CS
                        ON CS.`ID_STATUS` = ASIC.`STATUS_AUDITORIA`

                    LEFT JOIN `cat_alineacion_paf` CAP
                        ON CAP.`ID_ALINEACION_PAF` = AP.`ACTIVO` 
                        
                    WHERE ASIC.`STATUS` <> '0'
                        AND AP.`ID_PAF` = '1'
            ";
        */

        //  CONSULTA QUE ENVIA LAS AUDITORIAS DEL PAF CON ID MÁS GRANDE (MAX ID)
        
        $sql = "SELECT ASIC.`ID_AUDITORIA`,AP.`EJERCICIO`, AP.`AUDITORIA_SFP`, AP.`ID_TIPO_AUDITORIA`, AP.`DEPENDENCIA_RECURSO`,AP.`MONTO`,
                        ASIC.`STATUS_AUDITORIA`, ASIC.`MONTO_REVISADO`, ASIC.`MONTO_OBSERVADO`, ASIC.`FECHA_HORA`,
                        CS.`DESCRIPCION_STATUS`, CTA.`DESCRIPCION_TIPO_AUDITORIA`, CAP.`DESCRIPCION_ALINEACION_PAF`
                    
                    FROM `auditorias_sicosa` ASIC 

                    LEFT JOIN `auditorias_paf` AP 
                        ON AP.`AUDITORIA_SFP` = ASIC.`AUDITORIA_SFP` 

                    LEFT JOIN ( SELECT MAX(`ID_PAF`) AS `MAX_ID_PAF`
                                FROM `cat_paf`
                            ) AS MCP
                        ON MCP.`MAX_ID_PAF` = AP.`ID_PAF`

                    LEFT JOIN `cat_tipo_auditoria` CTA
                        ON CTA.`ID_TIPO_AUDITORIA` = AP.`ID_TIPO_AUDITORIA`

                    LEFT JOIN `cat_status` CS
                        ON CS.`ID_STATUS` = ASIC.`STATUS_AUDITORIA`

                    LEFT JOIN `cat_alineacion_paf` CAP
                        ON CAP.`ID_ALINEACION_PAF` = AP.`ACTIVO` 
                        
                    WHERE ASIC.`STATUS` <> '0';
            ";

        //die($sql);

        if( $result = mysqli_query($conexion_sicosa,$sql) ){

            echo "  <table id='tbl_audits' class='display mx-2' style='width:100%'>
                        <thead>
                            <tr>
                                <th><div class='text-center'>#</div></th>
                                <th><div class='text-center'>Auditoría PAF</div></th>
                                <th><div class='text-center'>Ejercicio Fiscal</div></th>
                                <th><div class='text-center'>Recurso</div></th>  		
                                <th><div class='text-center'>Tipo de Auditoria</div></th>           
                                <th><div class='text-center'>Alineación PAF</div></th>
                                <th><div class='text-center'>Estado</div></th>
                                <th><div class='text-center'>Monto Ejercido</div></th>
                                <th><div class='text-center'>Monto Revisado</div></th>
                                <th><div class='text-center'>Monto Observado</div></th>
                                <th><div class='text-center'>Opciones</div></th>
                            </tr>
                        </thead>
                        <tbody>
                ";

            if( mysqli_num_rows($result) != 0 ){

                while( $row = mysqli_fetch_assoc($result) ){

                    //echo "<pre>"; print_r($row); echo "</pre>";
                    //die();
                    /*
                        Array
                        (
                            [ID_AUDITORIA] => 1
                            [EJERCICIO] => 2023
                            [AUDITORIA_SFP] => AUDITORIA.0023
                            [ID_TIPO_AUDITORIA] => 3
                            [DEPENDENCIA_RECURSO] => U002 “Fondo para el Fortalecimiento de las Instituciones de Seguridad Pública”
                            [MONTO] => 12909300
                            [STATUS_AUDITORIA] => 1
                            [MONTO_REVISADO] => 0
                            [MONTO_OBSERVADO] => 0
                            [FECHA_HORA] => 2024-10-06 19:56:43
                            [DESCRIPCION_STATUS] => POR INICIAR
                            [DESCRIPCION_TIPO_AUDITORIA] => FEDERAL COORDINADA
                            [DESCRIPCION_ALINEACION_PAF] => ORDINARIO
                        )
                    */

                    $arr_resumen_observaciones = getResumenObservaciones($conexion_sicosa,$row["ID_AUDITORIA"]);
                    
                    $monto_solventar = "$0.00";

                    if( $arr_resumen_observaciones != NULL )    $monto_solventar = "$".number_format($arr_resumen_observaciones["TOTAL_MONTO_POR_SOLVENTAR"],2);
                        

                    echo "  <tr>
                                <td align='center'>1</td>
                                <td align='center'>".$row["AUDITORIA_SFP"]."</td>
                                <td align='center'>".$row["EJERCICIO"]."</td>
                                <td align='center'>".$row["DEPENDENCIA_RECURSO"]."</td>
                                <td align='center'>".$row["DESCRIPCION_TIPO_AUDITORIA"]."</td>
                                <td align='center'>".$row["DESCRIPCION_ALINEACION_PAF"]."</td>
                                <td align='center'>".showStatusActual($conexion_sicosa,$row["ID_AUDITORIA"])."</td>
                                <td align='center'>$".number_format($row["MONTO"],2)."</td>
                                <td align='center'>$".number_format($row["MONTO_REVISADO"],2)."</td>
                                <td align='center'>".$monto_solventar."</td>
                                <td align='center'>".showOptionTblAudit(php_encriptaID($row["ID_AUDITORIA"]))."</td>
                            </tr>
                        ";



                }

            }
            
            echo "	    </tbody>
                    </table>
                ";

            //  CÓDIGO JS

            echo "  <script>

                        var t = $('#tbl_audits').DataTable({

                            responsive: true,

                            //dom: 'Bfrtip',
                            //dom: `<'top'iflp<'clear'>>rt<'bottom'iflp<'clear'>>`,
                            //dom: `<'top'lfBt><'bottom'ip<'clear'>>`,

                            //'order': [1,'asc'],

                            buttons: [
                                'excel', 'pdf'
                            ],

                            pageLength : 5,

                            lengthMenu: [[5, 10, 15, -1], [5, 10, 15, 'Todos']],
                            
                            columnDefs: [
                                { width: '3%', targets: [0] },
                                { width: '10%', targets: [1] },
                                { width: '3%', targets: [2] },
                                { width: '10%', targets: [3] },
                                { width: '5%', targets: [4] },
                                { width: '5%', targets: [5] },
                                { width: '5%', targets: [6] },
                                { width: '5%', targets: [7] },
                                { width: '5%', targets: [8] },
                                { width: '5%', targets: [9] },
                                { width: '12%', targets: [10] }
                            ], 
                            
                            'language': {

                                'lengthMenu': 'Mostrar _MENU_ registros por página',
                                'zeroRecords': 'No se Encontrarón Registros',
                                'info': 'Página _PAGE_ de _PAGES_',
                                'infoEmpty': 'Sin Registros Encontrados',
                                'infoFiltered': '(filtrado de _MAX_ registros en total)',
                                'paginate': {
                                    'first': 'Primero',
                                    'last': 'Último',
                                    'next': 'Siguiente',
                                    'previous': 'Anterior'
                                },
                                'decimal':        '.',
                                'emptyTable':     'Sin Registros para Mostrar',
                                'infoPostFix':    '',
                                'thousands':      ',',
                                'loadingRecords': 'CARGANDO REGISTROS...',
                                'processing':     'PROCESANDO...',
                                'search':         'Filtrar:'

                            }

                        });

                        t.on( 'order.dt search.dt', function () {
                            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                cell.innerHTML = i+1;
                            } );
                        } ).draw();
                        
                    ";

        }

    }