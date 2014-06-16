<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'layout'=>TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableClientValidation'=>true,
	//'clientOptions'=>array(
	//	'validateOnSubmit'=>true,
	//),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<fieldset>	
	<?php echo $form->textFieldControlGroup($model, 'username',
		array('label'=>'Username','Placeholder'=>'Username'));?>
	<?php echo $form->passwordFieldControlGroup($model, 'password',
		array('label'=>'Password','Placeholder'=>'Password'));?>
	<div style="margin-left:3em;">
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo TbHtml::submitButton('Login'); ?>
		<?php echo TbHtml::submitButton(Yii::t('Yii','Cancel'),array(
 			'name'=>'buttonCancel',
			'color'=>TbHtml::BUTTON_COLOR_DANGER,
		    ));?>
	</div>
	</div>

</fieldset>
<?php $this->endWidget(); ?>
</div><!-- form -->
	
<?php
$this->widget('ext.jwplayer.Jwplayer',array(
    'width'=>'auto',
    'height'=>360,
    'file'=>'null', // the file of the player, if null we use demo file of jwplayer
    'image'=>'null', // the thumbnail image of the player, if null we use demo image of jwplayer
    'options'=>array(
        'controlbar'=>'bottom'
    )
));

  
 
    $this->widget('ext.Yiippod.Yiippod', array(
    'video'=>"https://www.youtube.com/watch?v=lWJiMlaAIg8", //if you don't use playlist
    //'video'=>"http://www.youtube.com/watch?v=qD2olIdUGd8", //if you use playlist
    'id' => 'yiippodplayer',
    'autoplay'=>true,
    'width'=>640,
    'view'=>6, 
    'height'=>480,
    'bgcolor'=>'#000'
    ));
 

/*
$this->widget ( 'ext.mediaElement.MediaElementPortlet',
    array ( 
    'url' => 'http://localhost/final/video2.mp4',   
	// or you can set the model and attributes
    //'model' => $model,
    //'attribute' => 'url'
	// its required and so you have to set correctly
     'mimeType' =>'video/mp4',
 
    ));
    ?>
    <br/>
    <br/>
    <?php 
    $this->widget('ext.jouele.Jouele', array(
    'file' => '/final/abc.mp3',
    'name' => 'Audio',
    'htmlOptions' => array(
        'class' => 'jouele-skin-silver',
     )
));
    */
?>
