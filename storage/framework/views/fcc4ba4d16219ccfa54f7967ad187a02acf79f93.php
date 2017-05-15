	<?php $__env->startSection('content'); ?>
	<?php if(Session::has('message')): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?php echo e(Session::get('message')); ?>

		</div>
	<?php endif; ?>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.masterAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>