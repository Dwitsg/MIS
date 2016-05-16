<h1>Gestion de Empresas</h1>


<?php if(isset($dataedit)) {echo form_open('empresa/update'."/".$dataedit[0]->idEmpresa, 'class="form-inline"');} else { echo form_open('empresa/insert', 'class="form-inline"');} ?>

  <div class="form-group">
    <label for="exampleInputName2">Nombre</label>
    <input type="text" name="empname" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->nombre_empresa;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Nit</label>
    <input type="text" name="nit" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->nit;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Direccion</label>
    <input type="text" name="empdirection" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->direccion;} ?>" />
  </div>
    <div class="form-group">
    <label for="exampleInputName2">Telefono</label>
    <input type="text" name="emptelefono" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->telefono;} ?>" />
  </div>
    <div class="form-group">
    <label for="exampleInputName2">Tipo de Empresa</label>
    <select name = "emptype" class="form-control">
        <option value="S.A.">S.A.</opction>
        <option value="S.R.L">S.R.L.</opction>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Representate</label>
    <select name = "emppersona" class="form-control">
        <?php 
            foreach ($selectper as $value) { ?>
                <?php if($value->idPersona == $dataedit[0]->Persona_idPersona) { ?>
                <option selected value="<?php echo $value->idPersona ?>"><?php echo $value->nomPersona ?></option>
            <?php 
            }
            else { ?>
                <option  value="<?php echo $value->idPersona ?>"><?php echo $value->nomPersona ?></option>
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
        <th>Nit</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Tipo de empresa</th>
        <th>Representate</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->nombre_empresa; ?></td>
                <td><?php echo $value->nit; ?></td>
                <td><?php echo $value->direccion; ?></td>
                <td><?php echo $value->telefono; ?></td>
                <td><?php echo $value->tipoEmpresa; ?></td>
                <td><?php echo $value->nomPersona; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/empresa/delete')."/".$value->idEmpresa; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/empresa/edit')."/".$value->idEmpresa; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>    