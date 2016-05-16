<h1>Gestion de Roles</h1>


<?php if(isset($dataedit)) {echo form_open('rol/update'."/".$dataedit[0]->idRol, 'class="form-inline"');} else { echo form_open('rol/insert', 'class="form-inline"');} ?>

  <div class="form-group">
    <label for="exampleInputName2">Nombre</label>
    <input type="text" name="rolname" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->nombre;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Descripcion</label>
    <input type="text" name="roldescription" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->descripcion;} ?>" />
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
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->nombre; ?></td>
                <td><?php echo $value->descripcion; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/rol/delete')."/".$value->idRol; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/rol/edit')."/".$value->idRol; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>