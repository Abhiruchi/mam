<?php
/* @var $this Category1Controller */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Category1s',
);

$this->menu=array(
	array('label'=>'Create Category1','url'=>array('create')),
	array('label'=>'Manage Category1','url'=>array('admin')),
);
?>

<h1>Category1s</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>