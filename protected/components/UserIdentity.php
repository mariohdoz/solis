<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public $_rut;
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $admin=Administrador::model()->find("LOWER(CORREOADMIN)=?", array(strtolower($this->username)));


        if($admin==null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        elseif($this->password!==$admin->CONTRAADMIN)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else{

            Yii::app()->session['activo'] = true;
            Yii::app()->session['admin_nombre']=$admin->NOMBRESADMIN;
            Yii::app()->session['admin_rut']=$admin->RUTADMIN;
            Yii::app()->session['admin_img']=$admin->imagen;
            Yii::app()->session['admin_ape']=$admin->APELLIDOSADMIN;
            Yii::app()->session['admin_correo']=$admin->CORREOADMIN;


            $this->errorCode=self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
}
