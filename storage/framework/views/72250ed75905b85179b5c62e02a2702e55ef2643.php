<?php $__env->startSection('title'); ?>
    Sophia | Registro Académico
<?php $__env->stopSection(); ?>

<?php
if (Session::has('perfil')) {
    $perfil = Session::get('perfil')->id_perfil;
}
?>

<?php $__env->startSection('content'); ?>
    <div class="row" style="padding-top: 50px;">
        <div class="col-sm-10">
            <div class="panel panel-default">
                <div class="panel-body" style="padding-left:50px;  padding-top:25px; padding-right:50px; padding-bottom:30px" >

                    <h3>Noticias </h3>

                    <h4>Últimos archivos relevantes</h4>

                    <?php if(isset($files) && !empty($files->count())): ?>
                        <table class="table table-bordered table-striped table-hover">.
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Creado</th>
                                <th>Tamaño</th>
                                <th>Tipo</th>
                                <th>Usuario</th>
                            </tr>
                            </thead>
                            <tbody id="tablePublic">
                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><a href="/download/<?php echo e($file->id_file); ?>"><?php echo e($file->name); ?></a></td>
                                    <td><?php echo e($file->created_at); ?></td>
                                    <td><?php echo e($file->size); ?></td>
                                    <td><?php echo e($file->extension); ?></td>
                                    <td><?php echo e($file->nombre); ?> <?php echo e($file->apellido); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Actualmente no existen archivos relevantes</p>
                    <?php endif; ?>

                    <h4 style="margin-top: 50px;">Últimos post más relevantes</h4>

                    <?php if(isset($posts) && !empty($posts->count())): ?>
                        <div id="postContent">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div class="panel" >
                                    <div class="panel-body">
                                        <div class="fb-user-thumb">
                                            <img src="<?php echo e(\Sophia\User::getAvatar($post->id_user)); ?>" alt="" class="img-circle">
                                        </div>

                                        <div class="fb-user-details">
                                            <h3><a href="#" class="#"> <?php echo e(\Sophia\User::find($post->id_user)->getFullName()); ?></a></h3>
                                            <p><?php echo e($post->created_at); ?></p>
                                        </div>

                                        <div class="clearfix"></div>

                                        <p class="fb-user-status">
                                            <?php echo e($post->contenido); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    <?php else: ?>
                        <p>No existen post relevantes</p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(URL::asset('js/ramo/contenido/controller.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::asset('js/ramo/muro/controller.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.masterUsuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>