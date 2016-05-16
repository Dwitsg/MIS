<h1>Gestion de Ventas</h1>


<?php if(isset($dataedit)) {echo form_open('venta/update'."/".$dataedit[0]->idProducto, 'class="form-inline"');} else { echo form_open('venta/insert', 'class="form-inline"');} ?>
  <div class="form-group">
    <label for="exampleInputName2">Dosificacion</label>
    <select name = "ventados" class="form-control">
        <?php 
            foreach ($selectcat as $value) { ?>
                <?php if($value->id == $dataedit[0]->Dosificacion_id) { ?>
                <option selected value="<?php echo $value->id ?>"><?php echo $value->nroautorizacion ?></option>
            <?php 
            }
            else { ?>
                <option  value="<?php echo $value->id ?>"><?php echo $value->nroautorizacion ?></option>
               <?php
            }
                
            }
        ?>
    </select>
  </div>
  <button type="submit" class="btn btn-default">
      Nueva venta
  </button>
<?php echo form_close(); ?>

<table class="table table-striped" style = "margin: 20px 0px;">
    <theader>
        <th>Fecha</th>
        <th>Total</th>
        <th>Dosificacion</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->fecha; ?></td>
                <td><?php echo $value->total; ?></td>
                <td><?php echo $value->nroautorizacion; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/producto/delete')."/".$value->idProducto; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/producto/edit')."/".$value->idProducto; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>    