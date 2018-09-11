<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript" src="<?php echo base_url("assets/js/busqueda-proveedores.js"); ?>"></script>

<h1>Busqueda Proveedores</h1>
<hr>

    <div class="row">
        <div class="col-md-1">
            <button type="button" id="btnAgregar" data-toggle="modal" data-target="#agregarSolicitudProveedorModal" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Agregar
                    </button>
        </div>

        <div class="col-md-11">
            <div class="input-group mb-3">
                <input id="busquedaNombreProveedor" type="text" class="form-control" placeholder="Nombre Proveedor" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button onclick="searchProveedor()" class="btn btn-success" type="button" id="button-addon2">
                        <i class="fas fa-search"></i>
                        Buscar
                    </button>
                </div>
            </div>
            <!-- <button type="button" id="btnAgregar" data-toggle="modal" data-target="#agregarProveedorModal" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Agregar
            </button> -->
        </div>
    </div>
    

    <table class="table table-hover" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Estado</th>
                <th scope="col">Telefono</th>
                <th scope="col">Tipo Proveedor</th>
                <th scope="col">Accion</th>
                <th scope="col"></th>
            </tr> 
        </thead>
        <tbody id="tablaProveedoresBusqueda">

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


    <!-- Modal  Info -->
    <div id="modalInformacionExtraProveedorBusqueda">
        

    </div>

    <!-- Modal -->
<div class="modal fade" id="agregarSolicitudProveedorModal" tabindex="-1" role="dialog" aria-labelledby="agregarSolicitudProveedorModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="agregarProveedorModalLabel">Solicitar Alta Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombreAltaProveedor">Nombre</label>
                    <input value="" type="text" id="nombreAltaProveedor" class="form-control" name="nombre">
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ciudadAltaProveedor">Ciudad</label>
                    <input value="" type="text" id="ciudadAltaProveedor" class="form-control" name="username">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="estadoAltaProveedor">Estado</label>
                    <input value="" type="text" id="estadoAltaProveedor" class="form-control" >
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
                    <label for="telefonoAltaProveedor">Número Telefónico</label>
                    <input value="" type="number" id="telefonoAltaProveedor" class="form-control" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipoAltaProveedor">Tipo Proveedor</label>
                    <select class="form-control" name="rol" id="tipoAltaProveedor">
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
                    <label for="nombreAltaContactoProveedor">Nombre Contacto</label>
                    <input value="" type="text" id="nombreAltaContactoProveedor" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="emailAltaContactoProveedor">Email Contacto</label>
                    <input value="" type="text" id="emailAltaContactoProveedor" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefonoAltaContactoProveedor">Telefono Contacto</label>
                    <input value="" type="text" id="telefonoAltaContactoProveedor" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="extensionAltaContactoProveedor">Extension Contacto</label>
                    <input value="" type="text" id="extensionAltaContactoProveedor" class="form-control">
                </div>
            </div>
        </div>


        <!-- <div class="row">
            <div class="col-md-12">
                <div class="form-group form-check">
                    <input checked type="checkbox" class="form-check-input" id="checkActivoProveedor">
                    <label class="form-check-label" for="checkActivoProveedor">Activo</label>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="razonAltaProveedor">Razon</label>
                    <textarea value="" rows="3" id="razonAltaProveedor" class="form-control" name="nombre"></textarea>
                </div>
            </div>
            
        </div>

        


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="solicitarAlta()" type="button" class="btn btn-primary">
            <i class="fas fa-save"></i>
            Guardar
        </button>
    </div>
    </div>



</div>
