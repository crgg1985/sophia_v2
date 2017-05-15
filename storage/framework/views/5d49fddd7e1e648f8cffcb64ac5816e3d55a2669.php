<?php $__env->startSection('title'); ?>
    Sophia | Muro Carrera
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
<?php
$carrera = Session::get('carrera');
$ramos = Session::get('ramos');
$usuario = Session::get('user');
$posteosCarrera= Session::get('posteosCarrera');
if (Session::has('perfil'))
{
    $perfil = Session::get('perfil')->id_perfil;
}
?>
<!-- http://bootdey.com/snippets/view/social-network-wall // de aquí saqué el template-->
<script type="text/javascript" src="<?php echo e(URL::asset('js/carrera/dashboard/controller.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/index_UsuarioMuro.css')); ?>">
<div class="container bootstrap snippet" Style="width:95%">
  <div class="row">
      <div class="col-sm-8">

        <div class="panel" Style="padding-left:15px; padding-right:15px; text-align:center">
            <h2> Muro de <?php echo e($carrera->nombre_carrera); ?> </h2>
            <hr/>
        </div>
          <div id="postContent">
              <?php echo $__env->make('ramo.forms.postCarrera', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php $__currentLoopData = $posteosCarrera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posteoCarrera): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              <div class="panel" id="post_<?php echo e($posteoCarrera->id); ?>">

                <div class="panel-body">

                    <div class="fb-user-thumb">
                        <?php if(Storage::disk('local')->has($posteoCarrera->id_user. '.jpg')): ?>
                            <img src="<?php echo e(route('profile.image', ['filename' => $posteoCarrera->id_user. '.jpg'])); ?>" alt="" class="img-circle">
                        <?php else: ?>
                            <img src="<?php echo e(URL::to('img/man_avatar.jpg')); ?>" alt="" class="img-circle">
                        <?php endif; ?>
                    </div>
                    <div class="fb-user-details">
                        <h3><a href="#" class="#"> <?php echo e($posteoCarrera->nombre); ?> <?php echo e($posteoCarrera->apellido); ?> </a></h3>
                        <p><?php echo e($posteoCarrera->created_at); ?>, USA</p>
                    </div>
                    <div class="clearfix"></div>
                    <p class="fb-user-status"> <?php echo e($posteoCarrera->contenido); ?>

                                </p>
                    <div class="fb-status-container fb-border">
                        <div class="fb-time-action">
                            <article class="post">
                                <a style="display:none"><?php echo e($posteoCarrera->contenido); ?></a>

                                <?php if($posteoCarrera->is_like == true): ?>
                                    <a href="javascript:" id="<?php echo e($posteoCarrera->id); ?>" class="setLike" title="Ya no me gusta!!">Ya no me gusta</a>
                                <?php else: ?>
                                    <a href="javascript:" id="<?php echo e($posteoCarrera->id); ?>" class="setLike" title="Me gusta!!">Me gusta</a>
                                <?php endif; ?>

                                <span>-</span>
                                <a href="#" title="Deja un comentario" data-toggle="collapse" data-target="#ver-comentarios-<?php echo e($posteoCarrera->id); ?>" aria-expanded="false" aria-controls="collapseExample">Comentar</a>
                                <span>-</span>
                                <?php if($posteoCarrera->id_user == $usuario->id || $perfil=='3' ): ?>
                                    <span>-</span>
                                    <a href="#" class="edit" title="Edita tu comentario">Editar</a>
                                    <span>-</span>
                                    <a href="<?php echo e(route('postCarrera.delete', ['id_posteo' => $posteoCarrera->id])); ?>" title="Eliminar">Eliminar</a>
                                <?php endif; ?>
                            </article>
                        </div>
                    </div>

                    <div class="fb-status-container fb-border fb-gray-bg">
                        <div class="fb-time-action like-info">
                            <span>A</span>
                            <a href="#" id="<?php echo e($posteoCarrera->id); ?>_cont" ><?php echo e($posteoCarrera->n_like_str); ?></a>
                            <span>les gusta esto</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                  <div class="collapse" id="ver-comentarios-<?php echo e($posteoCarrera->id); ?>">
                      <ul class="fb-comments">
                      <?php $__currentLoopData = $comentarioCarreraPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentarioCarreraPost): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <?php if($comentarioCarreraPost->id_post_carrera==$posteoCarrera->id): ?>
                          <li>
                              <div class="cmt-details">
                                  <a href="#"><?php echo e($comentarioCarreraPost->nombre); ?></a>
                                  <span> <?php echo e($comentarioCarreraPost->contenido); ?>  </span>
                                  <p><?php echo e($comentarioCarreraPost->created_at); ?></p>
                              </div>
                          </li>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </ul>
                      <div class="well">
                            <form action="<?php echo e(route('comentarPosteoCarrera', ['id_posteo_carrera' => $posteoCarrera->id])); ?>" method="post">
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
      <div class="col-sm-4">
          <div class="panel" Style="padding-left:15px; padding-right:15px">
              <h2> Usuarios seguidos </h2>
              <hr>
              <div>
                  <div class="fb-status-container fb-border fb-gray-bg">
                      <ul class="fb-comments">

                          <?php $__currentLoopData = $elementosSeguidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elemento): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                              <li>



                                  <a href="#" class="cmt-thumb">
                                      <?php if(Storage::disk('local')->has($elemento->user_id. '.jpg')): ?>
                                          <img src="<?php echo e(route('profile.image', ['filename' => $elemento->user_id. '.jpg'])); ?>" alt="" class="img-circle">
                                      <?php else: ?>
                                          <img src="<?php echo e(URL::to('img/man_avatar.jpg')); ?>" alt="" class="img-circle">
                                      <?php endif; ?>
                                  </a>
                                  <div class="cmt-details">


                                      <a href="#"> <?php echo e($elemento->user_nombre); ?>  <?php echo e($elemento->user_apellido); ?></a> <span style="color: #c3c3c3;">
                                      <?php if($elemento->tipo_elemento == 'publicacion_ramo' || $elemento->tipo_elemento == 'publicacion_carrera'): ?>
                                              publicó
                                          <?php else: ?>
                                              subió un archivo
                                          <?php endif; ?>

                                          en <?php echo e($elemento->nom_lugar); ?> - <?php echo e($elemento->created_at); ?></span>
                                      <p>
                                          <?php if($elemento->tipo_elemento == 'publicacion_ramo'): ?>
                                              <a href="/ramo/muro/<?php echo e($elemento->id_lugar); ?>#post_<?php echo e($elemento->id); ?>" class="post-normal"><?php echo e($elemento->contenido); ?></a>
                                          <?php elseif($elemento->tipo_elemento == 'publicacion_carrera'): ?>
                                              <a href="#post_<?php echo e($elemento->id); ?>" class="post-normal"><?php echo e($elemento->contenido); ?></a>
                                          <?php else: ?>
                                              <a href="/download/<?php echo e($elemento->id); ?>"><?php echo e($elemento->contenido); ?></a>
                                          <?php endif; ?>
                                      </p>
                                  </div>
                              </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="panel" Style="padding-left:15px; padding-right:15px; text-align:center ">
              <h2> Publicidad</h2>
              <hr/>
              <?php if($publicidad): ?>
                <?php if(Storage::disk('local')->has('id'.$publicidad->id.'_publicidad.jpg')): ?>
                  <section class="row" style="text-align:center">
                      <div class="" style="text-align: center; padding-bottom: 20px ;padding-left:15px; padding-right:15px; margin:auto" >
                          <a href="<?php echo e($publicidad->url); ?>">
                          <img class="img-responsive"  src="<?php echo e(route('publicidad.image', ['filename' => 'id'.$publicidad->id.'_publicidad.jpg'])); ?>" alt="" style="width:100%; height:250px">
                          </a>
                      </div>
                  </section>
                <?php endif; ?>
              <?php endif; ?>
          </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="editPost">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edita </h4>
            </div>
            <div class="modal-body">
                <form>
                    <textarea type="text" id="contenido_editar" name="contenido_editar" class="form-control" rows="2"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php echo $__env->make('layout.masterUsuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>