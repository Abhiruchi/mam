<?php

class AssetController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','viewer'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionViewer($id)
	{
		$model= $this->loadModel($id);
		$a = $model->file;
	//	print_r($model->file);
	//	die();
	//	print_r($viewer);
		//die();
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('viewer', array('a'=>$a));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Asset;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Asset'])) {
			$model->attributes=$_POST['Asset'];
			
			$model->file=CUploadedFile::getInstance($model,'file');
		//	
			$ext=$model->file->extensionName;
			//$model->createDate=
			// 
			if ($model->save()) {
				$model->type=$model->file->getType();
				$model->size = $model->file->getSize();
				$orgId=Yii::app()->user->getId();
				$fileName=$model->assetId;
				$categoryId=$_POST['Asset']['categoryId'];
				$old = umask(0);


				if (!is_dir(Yii::app()->basePath . '/../upload/' . $orgId . '/'.$categoryId.'/' )) {
                //mkdir(Yii::app()->basePath . '/../upload/' . $orgId . '/'.$categoryId.'/',0777 ,true);
                mkdir(Yii::app()->basePath . '/../upload/' . $orgId . '/'.$categoryId.'/',0777 ,true);
				}
				umask($old);
				
	/*	if (!is_dir(Yii::app()->basePath . '/../upload/' .'/' )) {
                mkdir(Yii::app()->basePath . '/../upload/' . $orgId . '/'.$categoryId.'/',0777 ,true);
                mkdir(Yii::app()->basePath . '/../upload/' .'/',0777 ,true);
				}*/
				
				$model->file->saveAs(Yii::app()->basePath.'/../upload/'.$orgId.'/'.$categoryId.'/'.$fileName.'.dat');
				
			//	$model->file->saveAs(Yii::app()->basePath.'/../upload/'.$fileName);
				if(!empty($_POST['read'])){
				$read = $_POST['read'];
				foreach($read as $readRow){
					$AssetOuFilep = new AssetOuFilep;
        	        $AssetOuFilep->assetId = $model->assetId;
            	    $AssetOuFilep->ouId = $readRow;
            	    $AssetOuFilep->fpId = 0;
                	$AssetOuFilep->save();
       			}}
				
       			
       			if(!empty($_POST['write'])){
				$write = $_POST['write'];
       			foreach($write as $writeRow){
					$AssetOuFilep = new AssetOuFilep;
        	        $AssetOuFilep->assetId = $model->assetId;
            	    $AssetOuFilep->ouId = $writeRow;
            	    $AssetOuFilep->fpId = 1;
                	$AssetOuFilep->save();
       			}}
       			
				
				if(!empty($_POST['edit'])){
				$edit = $_POST['edit'];
				foreach($edit as $editRow){
					$AssetOuFilep = new AssetOuFilep;
        	        $AssetOuFilep->assetId = $model->assetId;
            	    $AssetOuFilep->ouId = $editRow;
            	    $AssetOuFilep->fpId = 2;
                	$AssetOuFilep->save();
       			}}
				
       			
				if(!empty($_POST['delete'])){
				$delete = $_POST['delete'];
				foreach($delete as $deleteRow){
					$AssetOuFilep = new AssetOuFilep;
        	        $AssetOuFilep->assetId = $model->assetId;
            	    $AssetOuFilep->ouId = $editRow;
            	    $AssetOuFilep->fpId = 3;
                	$AssetOuFilep->save();
       			}}
			}
			
			$this->redirect(array('view','id'=>$model->assetId));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Asset'])) {
			$model->attributes=$_POST['Asset'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->assetId));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Asset');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Asset('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Asset'])) {
			$model->attributes=$_GET['Asset'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Asset the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Asset::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Asset $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='asset-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}