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
        $admin=Administrador::model()->find("LOWER(correo_admin)=?", array(strtolower($this->username)));


        if($admin==null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        elseif(sha1($this->password)!==$admin->contrasena_admin)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else{

            Yii::app()->session['activo'] = true;
            Yii::app()->session['admin_nombre']=$admin->nombres_admin;
            Yii::app()->session['admin_rut']=$admin->rut_admin;
            Yii::app()->session['admin_img']=$admin->perfil_admin;
            Yii::app()->session['admin_ape']=$admin->apellidos_admin;
            Yii::app()->session['admin_correo']=$admin->correo_admin;
            Yii::app()->session['admin_super'] = $admin->super_admin;
            Yii::app()->session['funcionario'] = $admin->fn_admin;



            $this->errorCode=self::ERROR_NONE;
        }

        return !$this->errorCode;
    }
}
