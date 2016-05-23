<h1>Gestion de Productos</h1>


<?php if(isset($dataedit)) {echo form_open('producto/update'."/".$dataedit[0]->idProducto, 'class="form-inline"');} else { echo form_open('producto/insert', 'class="form-inline"');} ?>

  <div class="form-group">
    <label for="exampleInputName2">Nombre</label>
    <input type="text" name="proname" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->nombre;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Descripcion</label>
    <input type="text" name="prodescription" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->descripcionpro;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Precio</label>
    <input type="text" name="proprice" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->precio;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Cantidad</label>
    <input type="text" name="procantidad" class="form-control" id="exampleInputName2" value="<?php if(isset($dataedit)){ echo $dataedit[0]->cantidad;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Categoria</label>
    <select name = "procat" class="form-control">
        <?php 
            foreach ($selectcat as $value) { ?>
                <?php if($value->idCategoria == $dataedit[0]->Categoria_idCategoria) { ?>
                <option selected value="<?php echo $value->idCategoria ?>"><?php echo $value->descripcion ?></option>
            <?php 
            }
            else { ?>
                <option  value="<?php echo $value->idCategoria ?>"><?php echo $value->descripcion ?></option>
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
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Categoria</th>
            <th>Cantidad</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->nombre; ?></td>
                <td><?php echo $value->descripcionpro; ?></td>
                <td><?php echo $value->precio; ?></td>
                <td><?php echo $value->descripcion; ?></td>
                <td><?php echo $value->cantidad; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/producto/delete')."/".$value->idProducto; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a href="<?php echo base_url('index.php/producto/edit')."/".$value->idProducto; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>    