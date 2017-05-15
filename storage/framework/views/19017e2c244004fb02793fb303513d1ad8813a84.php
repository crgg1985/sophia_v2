<?php $__env->startSection('content'); ?>
	<div class="panel" style="padding-left:15px; padding-right:15px; text-align:center; margin:auto ">
		<h3><i class="fa fa-shield"></i> Carreras</h3>
		<hr>
		<table class="table  table-striped table-hover table-condensed " id="carreras" name="carreras">
		<thead>
			<th class="header" style=" text-align:center; padding-right: 12px">id</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Nombre Carrera</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Operacion</th>
		</thead>
		<tbody>
		<?php $__currentLoopData = $carreras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrera): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($carrera->id); ?></td>
				<td><?php echo e($carrera->nombre_carrera); ?></td>
				<td>
					<a href="<?php echo e(route('editCarrera', $carrera->id )); ?>" class="btn btn-primary">Editar
					</a>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.masterAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>