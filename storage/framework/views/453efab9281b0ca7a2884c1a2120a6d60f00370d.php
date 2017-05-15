<?php $__env->startSection('title'); ?>
Sophia | Registro Académico
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row" style="padding-top: 50px;">
    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-body" style="padding-left:50px;  padding-top:25px; padding-right:50px; padding-bottom:30px" >

                <h3>Chats </h3>

                <?php if(count($messages) < 1): ?>
                <p>
                    Actualmente no posees mensajes
                </p>
                <?php else: ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Conversación con</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $used = []; ?>

                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <?php if($message->sender != Auth::user()->id && !in_array($message->sender, $used) && $message->message != '-'): ?>
                                        <?php array_push($used, $message->sender); ?>
                                        <td><?php echo e($message->sender_name); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('messages.show', [$message->uuid])); ?>" class="btn btn-success">Ver Conversación</a>
                                        </td>
                                    <?php elseif($message->receiver != Auth::user()->id && !in_array($message->receiver, $used) && $message->message != '-'): ?>
                                        <?php array_push($used, $message->receiver); ?>
                                        <td><?php echo e($message->receiver_name); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('messages.show', [$message->uuid])); ?>" class="btn btn-success">Ver Conversación</a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.masterUsuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>