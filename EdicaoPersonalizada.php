<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class EdicaoPersonalizada extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            //GET & POST
            'MyGetEndpoint' => array(
                //request type
                'reqType' => array('GET','POST'),

                //set authentication
                'noLoginRequired' => true,

                //endpoint path
                'path' => array('EdicaoPersonalizada', '?'),

                //endpoint variables
                'pathVars' => array('', 'data'),

                //method to call
                'method' => 'edicaoPersonalizada_method',

                //short help string to be displayed in the help documentation
                'shortHelp' => 'verificar o perfil e liberar ou bloquear determinados campos',

                //long help to be displayed in the help documentation
                'longHelp' => '',
            ),
        );
    }
    public function edicaoPersonalizada_method($api, $args){
        $GLOBALS['log']->fatal('edicaoPersonalizada_method: '. $args["data"]);
        $id = $args["data"];

        return $this->adminOuAccess($id);
    }

    public function adminOuAccess($id){
        $roleName1 = "access";
        $acl = in_array($roleName1, ACLRole::getUserRoles($id, array('disable_row_level_security' => true)));
        $user = BeanFactory::getBean('Users', $id, array('disable_row_level_security' => true));
        
        if($acl == true || $user->is_admin == true){
            return true;
        }
       
        return false;
    }
   
}