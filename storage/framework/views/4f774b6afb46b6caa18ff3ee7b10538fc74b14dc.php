<?php $__env->startSection('title'); ?>
    Sophia | Muro <?php echo e($ramo->nombre_ramo); ?>

<?php $__env->stopSection(); ?>



    <?php $__env->startSection('content'); ?>
<?php
$carrera = Session::get('carrera');
$ramos = Session::get('ramos');
$usuario = Session::get('user');

if (Session::has('perfil'))
{
    $perfil = Session::get('perfil')->id_perfil;
}

?>
        <!-- http://bootdey.com/snippets/view/social-network-wall // de aquí saqué el template-->
<script type="text/javascript" src="<?php echo e(URL::asset('js/ramo/muro/controller.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/index_UsuarioMuro.css')); ?>">
<div class="container bootstrap snippet" Style="width:80%">
    <div class="row">
        <div class="panel" Style="padding-left:15px; padding-right:15px">
            <h2> Muro de <?php echo e($ramo->nombre_ramo); ?> </h2>
            <h4><a href="<?php echo e(route('news', ['ramo' => $ramo->id])); ?>">Noticias</a></h4>
            <hr/>
        </div>
        <div id="postContent">
            <?php echo $__env->make('ramo.forms.postRamo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php $__currentLoopData = $posteosRamos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posteoRamo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="panel" id="post_<?php echo e($posteoRamo->id); ?>" >

                    <div class="panel-body">

                    <div class="fb-user-thumb">
                        <?php if(Storage::disk('local')->has($posteoRamo->id_user.'.jpg')): ?>
                            <img src="<?php echo e(route('profile.image', ['filename' =>$posteoRamo->id_user.'.jpg'])); ?>" alt="" class="img-circle">
                        <?php else: ?>
                            <img src="<?php echo e(URL::to('img/man_avatar.jpg')); ?>" alt="" class="img-circle">
                        <?php endif; ?>
                    </div>
                    <div class="fb-user-details">
                        <h3><a href="#" class="#"> <?php echo e($posteoRamo->nombre); ?> <?php echo e($posteoRamo->apellido); ?></a></h3>
                        <p><?php echo e($posteoRamo->created_at); ?>, USA</p>
                    </div>
                    <div class="clearfix"></div>
                    <p class="fb-user-status"> <?php echo e($posteoRamo->contenido); ?>

                    </p>
                    <div class="fb-status-container fb-border">
                        <div class="fb-time-action">
                            <article class="post" data-postid="<?php echo e($posteoRamo->id); ?>">
                                <a style="display:none"><?php echo e($posteoRamo->contenido); ?></a>

                                <?php if($posteoRamo->is_like == true): ?>
                                    <a href="javascript:" id="<?php echo e($posteoRamo->id); ?>" class="setLike" title="Ya no me gusta!!">Ya no me gusta</a>
                                <?php else: ?>
                                    <a href="javascript:" id="<?php echo e($posteoRamo->id); ?>" class="setLike" title="Me gusta!!">Me gusta</a>
                                <?php endif; ?>

                                <span>-</span>
                                <a href="#" title="Deja un comentario"data-toggle="collapse" data-target="#ver-comentarios-<?php echo e($posteoRamo->id); ?>" aria-expanded="false" aria-controls="collapseExample">Comentar</a>
                                <span>-</span>
                                <?php if($posteoRamo->id_user == $usuario->id  || $perfil=='3' ): ?>
                                    <span>-</span>
                                    <a href="#" class="edit" title="Edita tu comentario">Editar</a>
                                    <span>-</span>
                                    <a href="<?php echo e(route('postCarrera.delete', ['id_posteo' => $posteoRamo->id])); ?>" title="Eliminar">Eliminar</a>
                                <?php endif; ?>
                            </article>
                        </div>
                    </div>

                        <di class="fb-status-container fb-border fb-gray-bg">
                            <div class="fb-time-action like-info">
                                
                                <span>A</span>
                                <a href="#" id="<?php echo e($posteoRamo->id); ?>_cont" ><?php echo e($posteoRamo->n_like_str); ?></a>
                                <span>les gusta esto</span>
                            </div>

                            <div class="clearfix"></div>
                        </di>
                    </div>
                    <div class="collapse" id="ver-comentarios-<?php echo e($posteoRamo->id); ?>">
                        <ul class="fb-comments">
                            <?php $__currentLoopData = $comentarioRamoPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentarioRamoPost): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($comentarioRamoPost->id_post_ramo==$posteoRamo->id): ?>
                                    <li>
                                        <div class="cmt-details">
                                            <a href="#"><?php echo e($comentarioRamoPost->nombre); ?></a>
                                            <span> <?php echo e($comentarioRamoPost->contenido); ?>  </span>
                                            <p><?php echo e($comentarioRamoPost->created_at); ?></p>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                        <div class="well">
                            <form action="<?php echo e(route('comentarPosteoRamo', ['id_posteo_ramo' => $posteoRamo->id], ['id_ramo' => $ramo->id])); ?>" method="post">
                                <input type="text" class="form-control" style="width:70%" id="empresa" name="comentario" placeholder="Comenta" value="" required >
                                <button type="submit" class="btn btn-info pull-right" style="width:20%; margin-top:-33px;">Comentar</button>
                                <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token" id="_token">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar posteo</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="post-body">Edit the Post</label>
                        <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="modal-save">Guardar Cambios</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    var token = '<?php echo e(Session::token()); ?>';
    var urlEdit = '<?php echo e(route('edit')); ?>';
</script>

<?php echo $__env->make('layout.masterUsuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>