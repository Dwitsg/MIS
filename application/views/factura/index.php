<style media="all">
    .css-title {
        font-weight: bolder;
        font-size: 2.5em;
    }
    
    .css-business_data div {
        padding: 10px;
    }
    
    .css-user_data_panel,
    .css-business_data_panel {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    .css-invoice_data {
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #dbdbdb;
    }
    
    .css-invoice_data td {
        padding-left: 5px;
        padding-right: 5px;
    }
    
    .css-logo {
        max-width: 300px;
        max-height: 100px;
    }
    
    .table > tbody > tr > td,
    .table > tbody > tr > th,
    .table > tfoot > tr > td,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > thead > tr > th {
        padding: 0;
    }
</style>

<style media="print">
    body {
        font-size: 90%;
    }
    
    p {
        line-height: 0.5;
    }
</style>

<div class="wrapper">
    <section id='invoice' style='background-color: white; padding:5px;'>

        <div class='row'>
            <div class='col-xs-7 css-pdf_left'>
                <h1><?php echo $selectini[0]->nombre_empresa; ?></h1>
            </div>

            <div class='col-xs-5 css-business_data_panel text-center css-pdf_right'>
                <div class="css-business_data text-right">
                    <div>
                        <table class="css-invoice_data">
                            <tr>
                                <td><b>NIT:</b></td>
                                <td align="left"><?php echo $selectini[0]->nit; ?></td>
                            </tr>
                            <tr>
                                <td><b>FACTURA No.:</b></td>
                                <td align="left"><?php echo $selectini[0]->nroFactura; ?></td>
                            </tr>
                            <tr>
                                <td><b>AUTORIZACION No.:</b></td>
                                <td align="left"><?php echo $selectini[0]->nroautorizacion; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <p id="label_original"><b>ORIGINAL</b></p>
                </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p class="css-title text-center">FACTURA</p>
            </div>
        </div>

        <div class='row css-user_data_panel'>
            <div class='col-xs-6 css-pdf_left'>
                <p>Fecha:<b> <?php echo $selectini[0]->fecha; ?> </b></p>
                <p>Señor(a):<b> <?php echo $selectpro[0]->nombre_cliente; ?></b></p>
            </div>
            <div class='col-xs-6 text-right css-pdf_right'>
                <p>NIT/CI:<b> <?php echo $selectpro[0]->cedula; ?></b></p>
            </div>
        </div>

        <div class='divider divider-lg'></div>

        <table class='table table-bordered table-striped'>
            <thead>
                <tr class='bg-dark'>
                    <th class='text-center'>Cantidad</th>
                    <th class='text-center'>Concepto</th>
                    <th class='text-center'>P. Unit</th>
                    <th class='text-center'>SubTotal</th>
                </tr>
            </thead>
            <tbody>
                
                 <?php foreach ($selectpro as $value) { ?>
            <tr>
                <td class='text-center'><?php echo $value->cantidad; ?></td>
                <td class='text-center'><?php echo $value->nombre; ?></td>
                <td class='text-right'><?php echo $value->precio; ?></td>
                <td class='text-right'><?php echo $value->subtotal; ?></td>               
            </tr>
        <?php } ?>
                
                
                
             
                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-right">Total (Bs.)</th>
                    <th class='text-right'><?php echo $selectini[0]->total; ?></th>
                </tr>
            </tfoot>
        </table>

        <div class='row'>
            <div class='col-xs-8 css-pdf_left'>
                <p>Son: <b><?php echo $letra."  ".$decimal; ?>/100 Bolivianos</b></p>

                <p>Código de control: <b><?php echo $codigo ?></b></p>
            </div>
            <div class='col-xs-4 invoice-sum text-right css-pdf_right'>
                Fecha límite de emisión:
                <b><?php echo $selectini[0]->fechalimite; ?></b>
            </div>
        </div>

        <div class='row'>
            <div class="col-lg-10 text-center">
                <p><b>"ESTA FACTURA CONTRIBUYE AL DESARROLLO DE PAIS. EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY"</b></p>
            </div>
            <div class="col-lg-2" align="right">
                <img class="css-invoice_data" src="<?php echo base_url($qr); ?>"
                    width="100px">
            </div>
        </div>

        <div id="buttons_panel" class='row' align="center">
            <script src="<?php echo base_url("assets/plugins/jQuery/jQuery-2.2.0.min.js"); ?>"></script>
            <script>
                $(document).ready(function () {
                    $('#normal_print').click(function(){
                        send_to_print();
                    });

                    function send_to_print()
                    {
                        $('#panel_buttons').hide();
                        javascript:window.print();
                        $('#panel_buttons').show();
                    }
                });
            </script>
            <div id="panel_buttons">
                <button id="normal_print" class="btn btn-success">Impresión</button>
            </div>
          
        </div>
    </section>
</div>