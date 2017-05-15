<?php $__env->startSection('title'); ?>
    Sophia | Perfil
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
    $usuario = Session::get('user');
    ?>
    <div class="container bootstrap snippet" style="width:80%">
        <div class="row">
            <div class="panel">
                <section class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <header><h3>Tu Perfil </h3></header>
                        <form action="<?php echo e(route('updateProfile')); ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="first_name">Nombre</label>
                                <input type="text" name="first_name" class="form-control" value="<?php echo e($usuario->nombre); ?>" id="first_name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Apellido</label>
                                <input type="text" name="last_name" class="form-control" value="<?php echo e($usuario->apellido); ?>" id="last_name">
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                                <input type="text" name="fecha_nacimiento" class="form-control" value="<?php echo e($usuario->fecha_nacimiento); ?>" id="fecha_nacimiento">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo e($usuario->email); ?>" id="email">
                            </div>
                            <div class="form-group">
                                <label for="image">Seleccione Imagen (solamente .jpg)</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
                        </form>
                    </div>
                </section>
                <br/>
                <?php if(Storage::disk('local')->has($usuario->id . '.jpg')): ?>
                    <section class="row">
                        <div class="col-md-6 col-md-offset-3" style="text-align: center; padding-bottom: 20px" >
                            <img class="img-circle"  src="<?php echo e(route('profile.image', ['filename' => $usuario->id . '.jpg'])); ?>" alt="" style="width:250px; height:250px">
                        </div>
                    </section>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.masterUsuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>