<h1>Gestion de Clientes</h1>


<?php if(isset($dataedit)) {echo form_open('cliente/update'."/".$dataedit[0]->idCliente, 'class="form-inline"');} else { echo form_open('cliente/insert', 'class="form-inline"');} ?>

  <div class="form-group">
    <label for="exampleInputName2">Nombre</label>
    <input type="text" name="cliname" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->nombre;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">CI/NIT</label>
    <input type="text" name="clinit" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->cedula;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Tipo de Cliente</label>
    <select name = "clitype" class="form-control">
        <?php 
            foreach ($selectcat as $value) { ?>
                <?php if($value->idTipo_Cliente == $dataedit[0]->Tipo_Cliente_idTipo_Cliente) { ?>
                <option selected value="<?php echo $value->idTipo_Cliente ?>"><?php echo $value->descripcion ?></option>
            <?php 
            }
            else { ?>
                <option  value="<?php echo $value->idTipo_Cliente ?>"><?php echo $value->descripcion ?></option>
               <?php
            }
                
            }
        ?>
    </select>
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
        <th>CI/NIT</th>
        <th>Tipo Cliente</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->nombre; ?></td>
                <td><?php echo $value->cedula; ?></td>
                <td><?php echo $value->descripcion; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/cliente/delete')."/".$value->idCliente; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/cliente/edit')."/".$value->idCliente; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>    