<?php
/* @var $this AssetController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Assets',
);

$this->menu=array(
	array('label'=>'Create Asset','url'=>array('create')),
	array('label'=>'Manage Asset','url'=>array('admin')),
);
?>

<h1 style="margin-top:3em;">Assets</h1>
<?php 
$gridColumns = array(
		//array('name'=>'name', 'header'=>'ROLE'),
		array('name'=>'assetName', 'header'=>'Asset name'),
		array('name'=>'file', 'header'=>'file'),
		array('name'=>'createDate', 'header'=>'create date'),
		array('name'=>'status', 'header'=>'status'),
		array('name'=>'publication', 'header'=>'publication'),
		array('name'=>'onlineEditable', 'header'=>'online editable'),
		array('name'=>'size', 'header'=>'size'),
		array('name'=>'reviewer','header'=>'reviewer'),
		//'ownerId',
        array('name'=>'owner name','value'=>'$data->users->name'),
       // array('name'=>'view','type'=>'raw','value'=>$this->renderPartial('viewer', true, true)),
		array('name'=>'view online','type'=>'raw','value'=>'CHtml::link("view", array("asset/","viewer"=>$data->assetId))'),
	);
?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
	'columns'=> $gridColumns,
));
 ?>

