<h1>Gestion de Personas</h1>


<?php if(isset($dataedit)) {echo form_open('persona/update'."/".$dataedit[0]->idPersona, 'class="form-inline"');} else { echo form_open('persona/insert', 'class="form-inline"');} ?>

  <div class="form-group">
    <label for="exampleInputName2">Nombre</label>
    <input type="text" name="pername" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->nomPersona;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Apellido Materno</label>
    <input type="text" name="perapm" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->apPaterno;} ?>" />
  </div>
    <div class="form-group">
    <label for="exampleInputName2">Apellido Paterno</label>
    <input type="text" name="perapp" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->apMaterno;} ?>" />
  </div>
    <div class="form-group">
    <label for="exampleInputName2">Direccion</label>
    <input type="text" name="perdirec" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->direccion;} ?>" />
  </div>
    <div class="form-group">
    <label for="exampleInputName2">Telefono</label>
    <input type="text" name="pertel" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->telefono;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Carnet de Identidad</label>
    <input type="text" name="perci" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->ci;} ?>" />
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
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Carnet de Identidad</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->nomPersona; ?></td>
                <td><?php echo $value->apPaterno; ?></td>
                <td><?php echo $value->apMaterno; ?></td>
                <td><?php echo $value->direccion; ?></td>
                <td><?php echo $value->telefono; ?></td>
                <td><?php echo $value->ci; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/persona/delete')."/".$value->idPersona; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/persona/edit')."/".$value->idPersona; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>