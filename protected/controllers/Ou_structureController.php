<?php

class Ou_structureController extends BaseController
{
	public $layout = '//layouts/col2';

    public function   init()
    {
        parent::init();
    }
	public function actionTree()
	{
		$this->render('Tree');
	}

	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function behaviors()
	 {
	     return array(
	         'jsTreeBehavior' => array('class' => 'application.behaviors.JsTreeBehavior',
	             'modelClassName' => 'Ou_structure',
	             'form_alias_path' => 'application.views.ou_structure._form',
	             'view_alias_path' => 'application.views.ou_structure.view',
	                 'label_property' => 'name',
	                 'rel_property' => 'name'
	         )
	     );
	 }
	 
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ou_structure-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}