<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript" src="<?php echo base_url("assets/js/productos.js"); ?>"></script>

<h1>Vista Productos</h1>
<hr>

<div class="row">
        <div class="col-md-1">
            <button type="button" id="btnAgregar" data-toggle="modal" data-target="#agregarProductoModal" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Agregar
            </button>
        </div>
        <!-- <div class="col-md-11">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nombre Usuario" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button" id="button-addon2">
                        <i class="fas fa-search"></i>
                        Buscar
                    </button>
                </div>
            </div>
        </div> -->
    </div>
    <br>

    <table class="table table-hover table-responsive" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Tiempo Respuesta</th>
                <th scope="col">Capacidad Producción</th>
                <th scope="col">Lugar Entrega</th>
                <th scope="col">Estatus</th>
                <th scope="col">Accion</th>
                <th scope="col"></th>
            </tr> 
        </thead>
        <tbody id="tablaProductos">

            
        </tbody>
    
    </table>

    <!-- Modal Update -->
    <div id="modalUpdateProductos">
        

    </div>

    <!-- Modal  Info -->
    <div id="modalInformacionExtra">
        

    </div>



   <!-- Modal -->
    <div class="modal fade" id="agregarProductoModal" tabindex="-1" role="dialog" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="agregarModalLabel">Agregar un nuevo Producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombreProducto">Nombre</label>
                        <input value="" type="text" id="nombreProducto" class="form-control" name="nombre">
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="descripcionProducto">Descripción</label>
                        <textarea value="" rows="3" id="descripcionProducto" class="form-control" name="nombre"></textarea>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="entregaProducto">Lugar Entrega</label>
                        <select class="form-control" id="entregaProducto">
                            <option value="Fabrica">Fabrica</option>
                            <option value="Embarque">Embarque</option>
                            <option value="Bodega">Bodega</option>
                        </select>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="respuestaProducto">Tiempo Respuesta</label>
                        <input value="" type="text" id="respuestaProducto" class="form-control" name="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="produccionProducto">Capacidad Producción</label>
                        <input value="" type="number" id="produccionProducto" class="form-control" name="password">
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

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="proveedorProducto">Proveedor</label>
                        <!-- <input type="rol" id="rol" class="form-control" name="rol"> -->
                        <select class="form-control" name="rol" id="proveedorProducto">
                        <!--TODO: Iterar una query de los tipos de proveedores para agregarlos como opciones -->
                        <?php foreach($proveedores as $proveedor){ ?>

                        <option value="<?php echo $proveedor->idproveedor;?>"><?php echo $proveedor->nombre;?></option>

                        <?php } ?>

                    </select>

                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-check">
                        <input checked type="checkbox" class="form-check-input" id="checkActivoProducto">
                        <label class="form-check-label" for="checkActivoProducto">Activo</label>
                    </div>
                </div>
            </div>

            


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button onclick="agregarProducto()" type="button" class="btn btn-primary">
                <i class="fas fa-save"></i>
                Guardar
            </button>
        </div>
        </div>
    </div>
    </div>

