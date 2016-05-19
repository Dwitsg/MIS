<h1>Gestion de Ventas</h1>


<?php if(isset($dataedit)) {echo form_open('rol/update'."/".$dataedit[0]->idRol, 'class="row form-inline"');} else { echo form_open('venta/insertpro', 'class="row form-inline"');} ?>
<fieldset>
  <div class="form-group">
    <label for="exampleInputName2">Nro Venta</label>
    <input  type="text" name="nrofactura" class="form-control" id="exampleInputName2" value="<?php if(isset($id)){ echo $id;} ?>" />
  </div>
  <div class="form-group">
    <label for="exampleInputName2">Cliente</label>
    <select name = "cliente" class="form-control">
        <?php 
            foreach ($selectcli as $value) { ?>
                <?php if($value->idCliente == $dataedit[0]->Cliente_idCliente) { ?>
                <option selected value="<?php echo $value->idCliente ?>"><?php echo $value->nombre_cliente ?></option>
            <?php 
            }
            else { ?>
                <option  value="<?php echo $value->idCliente ?>"><?php echo $value->nombre_cliente ?></option>
               <?php
            }
                
            }
        ?>
    </select>
  </div>
  </fieldset> 
  <fieldset>
      
<div class="form-group">
    <label for="exampleInputName2">Producto</label>
    <select name = "producto" class="form-control">
        <?php 
            foreach ($selectpro as $value) { ?>
                <?php if($value->idProducto == $dataedit[0]->Producto_idProducto) { ?>
                <option selected value="<?php echo $value->idProducto ?>"><?php echo $value->nombre ?></option>
            <?php 
            }
            else { ?>
                <option  value="<?php echo $value->idProducto ?>"><?php echo $value->nombre ?></option>
               <?php
            }
                
            }
        ?>
    </select>
  </div>      
  <div class="form-group">
    <label for="exampleInputName2">Cantidad</label>
    <input type="text" name="cantidad" class="form-control" id="exampleInputName2" />
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
        <a href="<?php echo base_url('index.php/venta/update')."/".$id; ?>" type="button" class="btn btn-danger">Imprimir</a>
   </fieldset>   
<?php echo form_close(); ?>


<table class="table table-striped" style = "margin: 20px 0px;">
    <theader>
        <th>Producto</th>
        <th>Precio Uni.</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
        <th>Acciones</th>
    </theader>    
    
    <tbody>
        <?php foreach ($select as $value) { ?>
            <tr>
                <td><?php echo $value->nombre; ?></td>
                <td><?php echo $value->precio; ?></td>
                <td><?php echo $value->cantidad; ?></td>
                <td><?php echo $value->subtotal; ?></td>
                <td>
                    <a href="<?php echo base_url('index.php/venta/deletedp')."/".$value->idDetalle_Venta."/".$id; ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <a disabled href="<?php echo base_url('index.php/venta/editdp')."/".$value->idDetalle_Venta."/".$id; ?>" type="button" class="btn btn-primary">Editar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>