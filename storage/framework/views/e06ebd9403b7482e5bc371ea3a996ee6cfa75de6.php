	<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('alerts.request', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::model($docenteEditar,['route'=> ['updateDocente', $docenteEditar], 'method'=>'GET']); ?>

		<?php echo $__env->make('docente.forms.docente', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo Form::close(); ?>

	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>