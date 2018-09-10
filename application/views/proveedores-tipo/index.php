<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript" src="<?php echo base_url("assets/js/tipo.js"); ?>"></script>


<h1>Vista Tipo proveedores</h1>

<hr>

<div class="row">
    <div class="col-md-1">
        <button type="button" id="btnAgregarTipo" data-toggle="modal" data-target="#agregarTipoModal" class="btn btn-primary">
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

<table class="table table-hover" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Estatus</th>
            <th scope="col">Acciones</th>
        </tr> 
    </thead>
    <tbody id="tablaTiposProveedores">

        
    </tbody>

</table>

<!-- Modal Update -->
<div id="modalUpdateTipo">
    

</div>



<!-- Modal -->
<div class="modal fade" id="agregarTipoModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="agregarTipoModalLabel">Agregar un nuevo Tipo proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input value="" type="text" id="nombreTipo" class="form-control" name="nombre">
                </div>
            </div>
            
        </div>


        <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-check">
                        <input checked type="checkbox" class="form-check-input" id="checkActivoTipo">
                        <label class="form-check-label" for="checkActivoTipo">Activo</label>
                    </div>
                </div>
            </div>

        


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="agregarTipo()" type="button" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
    </div>
    </div>
</div>
</div>

