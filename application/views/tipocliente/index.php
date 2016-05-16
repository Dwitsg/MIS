<h1>Gestion de Tipos de cliente</h1>


<?php if(isset($dataedit)) {echo form_open('tipocliente/update'."/".$dataedit[0]->idTipo_Cliente, 'class="form-inline"');} else { echo form_open('tipocliente/insert', 'class="form-inline"');} ?>
  <div class="form-group">
    <label for="exampleInputName2">Descripcion</label>
    <input type="text" name="tipodescription" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->descripcion;} ?>" />
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
        <th>Descripcion</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->descripcion; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/tipocliente/delete')."/".$value->idTipo_Cliente; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/tipocliente/edit')."/".$value->idTipo_Cliente; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>