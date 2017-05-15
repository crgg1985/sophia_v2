<?php $__env->startSection('title'); ?>
Sophia | Registro Académico
<?php $__env->stopSection(); ?>
<?php
if (Session::has('perfil'))
{
$perfil = Session::get('perfil')->id_perfil;
}
?>
<?php $__env->startSection('content'); ?>

<script type="text/javascript" src="<?php echo e(URL::asset('js/users/ramo/controller.js')); ?>"></script>

<div class="row" style="padding-top: 50px;">
    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-left:50px;  padding-top:25px; padding-right:50px; padding-bottom:30px" >

                <h3>Compañeros </h3>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Mensaje</th>
                                <th>Seguir</th>
                                <?php if($perfil=='3'): ?>
                                    <th>Bloquear</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($user->id != Auth::user()->id): ?>
                                    <tr>
                                        <td><?php echo e($user->nombre); ?></td>
                                        <td><?php echo e($user->apellido); ?></td>
                                        <td><a href="<?php echo e(route('messages.check_msg', ['user1' => $user->id, 'user2' => Auth::user()->id])); ?>" class="btn btn-success">Enviar Mensaje</a></td>
                                        <td>
                                            <a href="javascript:" id="<?php echo e($user->id); ?>" class="btn btn-success btn-seguir" style="width:130px">
                                            <?php if($user->siguiendo == true): ?>
                                                Dejar de seguir
                                            <?php else: ?>
                                                Seguir
                                            <?php endif; ?>
                                            </a>
                                        </td>
                                        <?php if($perfil=='3'): ?>
                                            <?php if($user->estado==1): ?>
                                                <form action="<?php echo e(route('AdmEstudianteBloquearUsuario', ['id_user'=>$user->id])); ?>" method="post">
                                                    <td>
                                                        <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token" id="_token">
                                                        <button class="btn btn-success btn-seguir" style="width:130px" type="submit">Bloquear</button>                                               </button>
                                                    </td>

                                                </form>
                                            <?php endif; ?>
                                                <?php if($user->estado==0): ?>
                                                    <form action="<?php echo e(route('AdmEstudianteDesbloquearUsuario', ['id_user'=>$user->id])); ?>" method="post">
                                                        <td>
                                                            <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token" id="_token">
                                                            <button class="btn btn-success btn-seguir" style="width:130px" type="submit">Bloqueado</button>                                               </button>
                                                        </td>

                                                    </form>
                                                <?php endif; ?>
                                        <?php endif; ?>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.masterUsuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>