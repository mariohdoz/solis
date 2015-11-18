<?php

Class ReporteController extends Controller
{

    public function actionIndex(){
        $model=new Propiedad('search');
        $this->layout='//layouts/intraLayout';
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Propiedad']))
            $model->attributes=$_GET['Propiedad'];

        $this->render("index",array("model"=>$model));

    }
    public function actionGenerarPdf($id)
    {

        $model =Propiedad::model()->findByPk($id); //Consulta para buscar todos los registros
        $mPDF1 = Yii::app()->ePdf->mpdf('utf8_encode()','A4-L','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
        $mPDF1->useOnlyCoreFonts = true;
        $mPDF1->SetTitle("Cotización - Reporte");
        $mPDF1->SetAuthor("Propiedades Sol y Cobre");
        $mPDF1->SetWatermarkText("");
        $mPDF1->showWatermarkText = true;
        $mPDF1->watermark_font = 'DejaVuSansCondensed';
        $mPDF1->watermarkTextAlpha = 0.1;
        $mPDF1->ignore_invalid_utf8 = true;
        $mPDF1->SetDisplayMode('fullpage');
        $mPDF1->WriteHTML($this->renderPartial('cotizarpdf', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
        $mPDF1->Output('Cotizaci�n Propiedad'.date('YmdHis'),'I');  //Nombre del pdf y par�metro para ver pdf o descargarlo directamente.
        exit;
    }
    public function actionAdmin()
    {
        $model=new Propiedad('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Propiedad']))
            $model->attributes=$_GET['Propiedad'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }
}