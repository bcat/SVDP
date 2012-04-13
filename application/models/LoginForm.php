<?php

class Application_Model_LoginForm extends Zend_Form
{
    public function _construct($options = null){
        parent::_construct($options);
        $this->setName('login');
        $this->setAttrib('id','login');
        $this->setMethod('post');
        $this->setAction('/SVDP/public/login/process');
        
        //Username must consist of letters only
        // must be between 5 and 20 characters
        $username = $this->addElement('text',
                                      'username',
                                      array('filters' => array('StringTrim',
                                                                'StringToLower'),
                                            'validators' => array('Alnum',
                                                                    array('StringLength',
                                                                        false, array(1,20)),
                                                                 ),
                                            'required' => true,
                                            'label' => 'Username:',));
        
        //Password must consist of alphanumeric characters only.
        // must be between 6 and 20 characters
        $password = $this->addElement('password',
                                      'password',
                                      array('filters' => array('StringTrim'),
                                            'validators' => array('Alum',
                                                                  array('StringLength',
                                                                        false,
                                                                        array(6,20)),
                                                                 ),
                                           'required' => true,
                                           'label' => 'Password:',));
        
        $login = this->addElement('submit','login',array(
            'required' => false,
            'ignore' => true,
            'label' => 'Login',
        ));
    }
}