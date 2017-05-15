<?php $__env->startSection('content'); ?>
	<div class="panel" style="padding-left:15px; padding-right:15px; text-align:center; margin:auto ">
		<h3><i class="fa fa-shield"></i> Docentes</h3>
		<hr>
		<table class="table  table-striped table-hover table-condensed " id="docentes" name="docentes">
		<thead>
			<th>id</th>
			<th>Nombre</th>
			<th>Apellido Paterno</th>
			<th>Apellido Materno</th>
			<th>Email</th>
			<th>estado</th>
			<th>Operacion</th>
		</thead>
		<tbody>
		<?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($docente->id); ?></td>
				<td><?php echo e($docente->nombre); ?></td>
				<td><?php echo e($docente->apellido_paterno); ?></td>
				<td><?php echo e($docente->apellido_materno); ?></td>
				<td><?php echo e($docente->email); ?></td>
				<td><?php if ($docente->estado == 1) echo "Activo";
			if ($docente->estado == 0) echo "Inactivo";?></td>
				<td>
					<a href="<?php echo e(route('editDocente', $docente->id )); ?>" class="btn btn-primary">Editar
					</a>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.masterAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>