<?php
/* @var $this PermissionsController */
/* @var $model Permissions */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'permissions-form',
    'layout'=>TbHtml::FORM_LAYOUT_HORIZONTAL,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

			
			
            <?php echo $form->dropDownListControlGroup($model, 'module_mid',
			array('Module 1', 'Module 2', 'Module 3'), array('label'=>'Module')); ?>
		
			
			<?php echo $form->textFieldControlGroup($model,'name',array('maxlength'=>65,'label'=>'Permissions')); ?>

            <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>6,'span'=>8)); ?>

            

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->