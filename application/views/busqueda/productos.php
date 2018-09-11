<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript" src="<?php echo base_url("assets/js/busqueda-productos.js"); ?>"></script>

<h1>Busqueda Productos</h1>
<hr>



<div class="row">
        <div class="col-md-1">
            <!-- <button type="button" id="btnAgregar" data-toggle="modal" data-target="#agregarProductoModal" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Agregar
            </button> -->
        </div>
        <div class="col-md-12">
            <div class="input-group mb-3">
                <input id="busquedaNombre" type="text" class="form-control" placeholder="Nombre Producto" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button onclick="searchProducto()" class="btn btn-success" type="button" id="button-addon2">
                        <i class="fas fa-search"></i>
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>
    

    <table class="table table-hover table-responsive" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Tiempo Respuesta</th>
                <th scope="col">Capacidad Producción</th>
                <th scope="col">Lugar Entrega</th>
                <th scope="col">Nombre Proveedor</th>
                <th scope="col">Ciudad Proveedor</th>
                <th scope="col">Estado Proveedor</th>
                <th scope="col">Tipo Proveedor</th>
                <th scope="col"></th>
            </tr> 
        </thead>
        <tbody id="tablaProductosBusqueda">

            
        </tbody>
    
    </table>

    <!-- Modal  Info -->
    <div id="modalInformacionExtraBusqueda">
        

    </div>
</div>

