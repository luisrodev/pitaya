<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <h1><?php echo $titulo;?></h1>
    <hr>

    <div class="row">
        <div class="col-md-1">
            <button type="button" id="btnAgregar" data-toggle="modal" data-target="#agregarModal" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Agregar
            </button>
        </div>
        <div class="col-md-11">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Nombre Usuario" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button" id="button-addon2">
                        <i class="fas fa-search"></i>
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-hover" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rol</th>
                <th scope="col">Fecha Creacion</th>
                <th scope="col">Estado</th>
                <th scope="col">Accion</th>
            </tr> 
        </thead>
        <tbody>

            <?php foreach($users as $user){?>
            <tr>
                <th scope="row"><?php echo $user->idusuario;?></th>
                <td><?php echo $user->nombre;?></td>
                <td><?php echo $user->username;?></td>
                
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->rol;?></td>
                <td><?php echo $user->fecha_creacion;?></td>
                <td><?php echo ($user->active == 1)? "Activo": "Inactivo";?></td>
                <td>                    
                    <button type="button" onclick="eliminar(<?php echo $user->idusuario;?>)" class="btn btn-outline-danger">
                    
                        <i class="fas fa-trash-alt"></i>
                    </button>
                    <button type="button" class="btn btn-outline-success">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="accionDropdown<?php echo $user->idusuario;?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Accion
                        </button>
                        <div class="dropdown-menu" aria-labelledby="accionDropdown<?php echo $user->idusuario;?>">
                            <a class="dropdown-item" onclick="eliminar(<?php echo $user->idusuario;?>);" href="#">Eliminar</a>
                            <a class="dropdown-item" href="#">Editar</a>
                        </div>
                    </div> -->
                </td>
            </tr>
            <?php }?>  
        </tbody>
    
    </table>



   <!-- Modal -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="agregarModalLabel">Agregar un nuevo usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="luis armando rubio" type="text" id="nombre" class="form-control" name="nombre">
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Nombre Usuario</label>
                        <input value="luirting" type="text" id="username" class="form-control" name="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input value="luislaro" type="text" id="password" class="form-control" name="password">
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
                        <label for="email">Correo Electronico</label>
                        <input value="luirting@gmail.com" type="email" id="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <!-- <input type="rol" id="rol" class="form-control" name="rol"> -->
                        <select name="rol" id="rol" class="form-control">
                            <option value="administrador">Administrador</option>
                            <option value="gerente">Gerente</option>
                            <option value="empleado">Empleado</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="checkActivo">
                        <label class="form-check-label" for="checkActivo">Activo</label>
                    </div>
                </div>
            </div>

            


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button onclick="agregarUsuario()" type="button" class="btn btn-primary">Guardar</button>
        </div>
        </div>
    </div>
    </div>

