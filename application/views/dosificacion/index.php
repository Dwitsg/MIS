<h1>Gestion de Dosificacion</h1>


<?php if(isset($dataedit)) {echo form_open('dosificacion/update'."/".$dataedit[0]->id, 'class="form-inline"');} else { echo form_open('dosificacion/insert', 'class="form-inline"');} ?>

  <div class="form-group">
    <label for="exampleInputName2">Nro Autorizacion</label>
    <input type="text" name="docnro" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->nroautorizacion;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Fecha limite de Emision</label>
    <input type="date" name="docfecha" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->fechalimite;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Llave de Dosificacion</label>
    <input type="text" name="docllave" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->llavedosificacion;} ?>" />
  </div>
  
  <button type="submit" class="btn btn-default">
      <?php 
        if(isset($dataedit)){
            echo "Actualizar";
        } else {
            echo "Agregar";
        }
      ?>
  </button>
<?php echo form_close(); ?>

<table class="table table-striped" style = "margin: 20px 0px;">
    <theader>
        <th>Nro Autorizacion</th>
        <th>Fecha Limite de Emision</th>
        <th>Llave</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->nroautorizacion; ?></td>
                <td><?php echo $value->fechalimite; ?></td>
                <td><?php echo $value->llavedosificacion; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/dosificacion/delete')."/".$value->id; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/dosificacion/edit')."/".$value->id; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>    