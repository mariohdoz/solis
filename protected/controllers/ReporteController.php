<?php

Class ReporteController extends Controller
{
    public $layout='//layouts/intraLayout';


    public function actionIndex(){
        $model=new Propiedad('search');
        $this->layout='//layouts/intraLayout';
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Propiedad']))
            $model->attributes=$_GET['Propiedad'];

        $this->render("index",array("model"=>$model));

    }
    public function actionGanancia(){
        $model=new Arriendo('search');
        $this->layout='//layouts/intraLayout';
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Arriendo']))
            $model->attributes=$_GET['Arriendo'];

        $this->render("ganancia",array("model"=>$model));

    }
    public function actionGanancia2(){
        $model=new Pago('reporte');  // clear any default values
        if(isset($_POST['Pago'])) {
            $model->attributes = $_POST['Pago'];// se obitnene las fechas desde el post
            var_dump($model->inicio);// se obtiene la fecha de inicio
            var_dump($model->final);// se obtiene la fecha de término
            yii::app()->end(); // jano ql el var_dump y el Yii::app sacalo wn por que si no, no te va a funcionar
            $model =Propiedad::model()->findAll();
            $mPDF1 = Yii::app()->ePdf->mpdf('utf8_encode()','A4-L','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
            $mPDF1->useOnlyCoreFonts = true;
            $mPDF1->SetTitle("Propiedad - Reporte");
            $mPDF1->SetAuthor("Propiedades Sol y Cobre");
            $mPDF1->SetWatermarkText("");
            $mPDF1->showWatermarkText = true;
            $mPDF1->watermark_font = 'DejaVuSansCondensed';
            $mPDF1->watermarkTextAlpha = 0.1;
            $mPDF1->ignore_invalid_utf8 = true;
            $mPDF1->SetDisplayMode('fullpage');
            $mPDF1->WriteHTML($this->renderPartial('gananciapdf', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
            $mPDF1->Output('Reporte Propiedad'.date('YmdHis').'.pdf','I');  //Nombre del pdf y par?metro para ver pdf o descargarlo directamente.
            exit;
        }
        $this->render("ganancia2",array("model"=>$model));

    }
    public function actionSelect($id){
        $model =Arriendo::model()->findByPk($id);
        $this->layout='//layouts/intraLayout';
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Arriendo']))
            $model->attributes=$_GET['Arriendo'];

        $this->render("select",array("model"=>$model));

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
        $mPDF1->Output('Cotización Propiedad'.date('YmdHis'),'I');  //Nombre del pdf y par�metro para ver pdf o descargarlo directamente.
        exit;
    }
    public function actionGananciaPdf()
    {   $model= new Pago;
        echo '1';
        if(isset($_POST['Pago'])) {
            $model->attributes = $_POST['Pago'];
            var_dump($model->inicio.' '.$model->final);
            Yii::app()->end();
        }

        $model =Propiedad::model()->findAll();
        $mPDF1 = Yii::app()->ePdf->mpdf('utf8_encode()','A4-L','','',15,15,35,25,9,9,'L'); //Esto lo pueden configurar como quieren, para eso deben de entrar en la web de MPDF para ver todo lo que permite.
        $mPDF1->useOnlyCoreFonts = true;
        $mPDF1->SetTitle("Propiedad - Reporte");
        $mPDF1->SetAuthor("Propiedades Sol y Cobre");
        $mPDF1->SetWatermarkText("");
        $mPDF1->showWatermarkText = true;
        $mPDF1->watermark_font = 'DejaVuSansCondensed';
        $mPDF1->watermarkTextAlpha = 0.1;
        $mPDF1->ignore_invalid_utf8 = true;
        $mPDF1->SetDisplayMode('fullpage');
        $mPDF1->WriteHTML($this->renderPartial('gananciapdf', array('model'=>$model), true)); //hacemos un render partial a una vista preparada, en este caso es la vista pdfReport
        $mPDF1->Output('Reporte Propiedad'.date('YmdHis').'.pdf','I');  //Nombre del pdf y par?metro para ver pdf o descargarlo directamente.
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
