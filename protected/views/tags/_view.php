<?php
/* @var $this TagsController */
/* @var $data Tags */
?>

<div class="view">

    	
	<b><?php echo CHtml::encode($data->getAttributeLabel('tagName')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tagName),array('view','id'=>$data->tagId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orgId')); ?>:</b>
	<?php echo CHtml::encode($data->organisation->orgName); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('dept_id')); ?>:</b>
	<?php echo CHtml::encode($data->ou_structure->name); ?>
	<br />

	


</div>