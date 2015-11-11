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
    public function actionGenerarPdf()
    {
        $model =Propiedad::model()->findAll(); //Consulta para buscar todos los registros
        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8','A4-L','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
        $mPDF1->useOnlyCoreFonts = true;
        $mPDF1->SetTitle("Cotización - Reporte");
        $mPDF1->SetAuthor("Propiedades Sol y Cobre");
        $mPDF1->SetWatermarkText("");
        $mPDF1->showWatermarkText = false;
        $mPDF1->watermark_font = 'DejaVuSansCondensed';
        $mPDF1->watermarkTextAlpha = 0.1;

        $mPDF1->SetDisplayMode('fullpage');
        $mPDF1->WriteHTML($this->renderPartial('cotizarpdf', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
        $mPDF1->Output('Cotización Propiedad'.date('YmdHis'),'I');  //Nombre del pdf y parámetro para ver pdf o descargarlo directamente.
        exit;
    }
}