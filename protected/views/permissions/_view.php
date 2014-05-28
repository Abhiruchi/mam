<?php
/* @var $this PermissionsController */
/* @var $data Permissions */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pid),array('view','id'=>$data->pid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('module_mid')); ?>:</b>
	<?php echo CHtml::encode($data->module_mid); ?>
	<br />


</div>