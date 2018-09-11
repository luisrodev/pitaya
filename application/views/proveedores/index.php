<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript" src="<?php echo base_url("assets/js/proveedores.js"); ?>"></script>

<h1>Vista proveedores</h1>

<hr>

<div class="row">
    <div class="col-md-1">
        <button type="button" id="btnAgregar" data-toggle="modal" data-target="#agregarProveedorModal" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Agregar
        </button>
    </div>
</div>
<br>

<table class="table table-hover" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Estado</th>
            <th scope="col">Telefono</th>
            <!-- <th scope="col">Nombre Contacto</th>
            <th scope="col">Email Contacto</th>
            <th scope="col">Telefono Contacto</th>
            <th scope="col">Extension Contacto</th> -->
            <th scope="col">Estatus</th>
            <th scope="col">Creado</th>
            <th scope="col">Tipo Proveedor</th>
            <th scope="col">Accion</th>
            <th scope="col"></th>
        </tr> 
    </thead>
    <tbody id="tablaProveedores">

    <!-- <tr>
        <td scope="now">100</td>
        <td>Walmart</td>
        <td>Hemosillo</td>
        <td>Sonora</td>
        <td>6623663465</td>
        <td>Activo</td>
        <td>2018-10-12 22:10:10</td>
        <td>Computadoras</td>
        
        <td>
            <button type="button" class="btn btn-outline-danger">
                    <i class="fas fa-trash-alt"></i>
                </button>

                <button type="button" class="btn btn-outline-success">
                    <i class="fas fa-pencil-alt"></i>
                </button>
        </td>

        <td>
            <button type="button" class="btn btn-outline-success">
            <i class="fas fa-info-circle"></i>
            Mostrar
            </button>
        </td>


    </tr> -->

        
    </tbody>

</table>

<!-- Modal Update -->
<div id="modalUpdateProveedor">
    

</div>


<!-- Modal  Info -->
<div id="modalInformacionExtra">
    

</div>


<!-- Modal -->
<div class="modal fade" id="agregarProveedorModal" tabindex="-1" role="dialog" aria-labelledby="agregarProveedorModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="agregarProveedorModalLabel">Agregar un nuevo Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombreProveedor">Nombre</label>
                    <input value="" type="text" id="nombreProveedor" class="form-control" name="nombre">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ciudadProveedor">Ciudad</label>
                    <input value="" type="text" id="ciudadProveedor" class="form-control" name="username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estadoProveedor">Estado</label>
                    <input value="" type="text" id="estadoProveedor" class="form-control" >
                </div>
            </div>
            <!-- <div class="col-md-6">
            <div class="form-group">
                <label for="email">Correo Electronico</label>
                <input type="email" id="email" class="form-control" name="email">
            </div>
            </div> -->
        </div>


        <div class="row">
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefonoProveedor">Número Telefónico</label>
                    <input value="" type="number" id="telefonoProveedor" class="form-control" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipoProveedor">Tipo Proveedor</label>
                    <select class="form-control" name="rol" id="tipoProveedor">
                        <!--TODO: Iterar una query de los tipos de proveedores para agregarlos como opciones -->
                        <?php foreach($tipos as $tipo){ ?>

                        <option value="<?php echo $tipo->idtipo_proveedor;?>"><?php echo $tipo->nombre;?></option>

                        <?php } ?>

                    </select>
                    
                </div>
            </div>

            
        </div>

        


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombreContactoProveedor">Nombre Contacto</label>
                    <input value="" type="text" id="nombreContactoProveedor" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailContactoProveedor">Email Contacto</label>
                    <input value="" type="text" id="emailContactoProveedor" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefonoContactoProveedor">Telefono Contacto</label>
                    <input value="" type="text" id="telefonoContactoProveedor" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="extensionContactoProveedor">Extension Contacto</label>
                    <input value="" type="text" id="extensionContactoProveedor" class="form-control">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-check">
                    <input checked type="checkbox" class="form-check-input" id="checkActivoProveedor">
                    <label class="form-check-label" for="checkActivoProveedor">Activo</label>
                </div>
            </div>
        </div>

        


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="agregarProveedor()" type="button" class="btn btn-primary">
            <i class="fas fa-save"></i>
            Guardar
        </button>
    </div>
    </div>
</div>
</div>
