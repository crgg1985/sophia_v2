<?php $__env->startSection('content'); ?>


	<div class="panel" style="padding-left:15px; padding-right:15px; text-align:center ">
	<h3><i class="fa fa-shield"></i> Usuarios</h3>
	<hr>
	<table class="table  table-striped table-hover table-condensed " id="usuarios" name="usuarios">
		<thead>
			<th class="header" style=" text-align:center; padding-right: 12px">id usuario</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Nombre</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Apellido</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Fecha Nacimiento</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Email</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Perfil</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Estado</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Operacion</th>
		</thead>
		<tbody>
		<?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($usuario->id); ?></td>
				<td><?php echo e($usuario->nombre); ?></td>
				<td><?php echo e($usuario->apellido); ?></td>
				<td><?php echo e($usuario->fecha_nacimiento); ?></td>
				<td><?php echo e($usuario->email); ?></td>
				<td><?php echo e($usuario->descripcion_perfil); ?></td>
				<td><?php if ($usuario->estado == 1) echo "Activo";
					if ($usuario->estado == 0) echo "Inactivo";;?></td>
				<td>
					<a href="<?php echo e(route('editUser', $usuario->id )); ?>" class="btn btn-primary">Editar
					</a>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.masterAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>