<?php $__env->startSection('content'); ?>
<div class="panel" style="padding-left:15px; padding-right:15px; text-align:center; margin:auto ">
	<h3><i class="fa fa-shield"></i> Instituciones</h3>
	<hr>
	<table class="table  table-striped table-hover table-condensed " id="instituciones" name="instituciones">
		<thead>
			<th class="header" style=" text-align:center; padding-right: 12px">id Institución</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Nombre</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Tipo Institucion</th>
			<th class="header" style=" text-align:center; padding-right: 12px">Operacion</th>
		</thead>
		<tbody>
		<?php $__currentLoopData = $instituciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $institucion): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($institucion->id); ?></td>
				<td><?php echo e($institucion->nombre_institucion); ?></td>
				<td><?php if ($institucion->id_tipo_institucion == 1) echo "Universidad";
					if ($institucion->id_tipo_institucion == 2) echo "Centro de Formación Técnica";
					if ($institucion->id_tipo_institucion == 3) echo "Instituto Profesional";?> </td>
				<td>
					<a href="<?php echo e(route('editInstitucion', $institucion->id )); ?>" class="btn btn-primary">Editar
					</a>
				</td>
			</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</tbody>
	</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.masterAdmin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>