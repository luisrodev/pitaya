<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <h2><?php echo $saludo; ?></h2>

    <button type="button" id="btnAgregar" data-toggle="modal" data-target="#agregarModal" class="btn btn-primary">Agregar nuevo usuario</button>

    <table class="table table-hover table-sm" style="margin-top: 15px;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Nombre Usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rol</th>
                <th scope="col">Accion</th>
            </tr> 
        </thead>
        <tbody>

            <?php foreach($users as $user){?>
            <tr>
                <th scope="row"><?php echo $user->idusuario;?></th>
                <td><?php echo $user->nombre;?></td>
                <td><?php echo $user->username;?></td>
                <td><?php echo $user->password;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->rol;?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="accionDropdown<?php echo $user->idusuario;?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Accion
                        </button>
                        <div class="dropdown-menu" aria-labelledby="accionDropdown<?php echo $user->idusuario;?>">
                            <a class="dropdown-item" onclick="eliminar(<?php echo $user->idusuario;?>);" href="#">Eliminar</a>
                            <a class="dropdown-item" href="#">Editar</a>
                        </div>
                    </div>
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
                        <input type="text" id="nombre" class="form-control" name="nombre">
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Nombre Usuario</label>
                        <input type="text" id="username" class="form-control" name="username">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" id="password" class="form-control" name="password">
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
                        <input type="email" id="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <!-- <input type="rol" id="rol" class="form-control" name="rol"> -->
                        <select name="rol" id="rol" class="form-control">
                            <option value="administrador">administrador</option>
                            <option value="gerente">gerente</option>
                            <option value="empleado">empleado</option>
                        </select>
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

