<?php
    
    namespace Application\Form;

    use Zend\Form\Form;
    use Zend\Form\Element\Select;
    use Google\Cloud\Translate\TranslateClient;

    class SearchForm extends Form
    {
        public function __construct()
        {
            parent::__construct('search');
    
            $translate = new TranslateClient();
            $langs = $translate->localizedLanguages([
                'target' => 'tr',
                'key' => 'AIzaSyCb2FHhpl7uvffSj05gbIM11hrukSl9gS4'
            ]);
            $lng = [];
            foreach($langs as $lang){
                $lng+=[
                    $lang['code'] => $lang['name']
                ];
            }
            
            $this->add(array(
                'name' => 'content',
                'attributes'=>array(
                    
                    'class'=>'input100 required',
                    'placeholder'=>'Type the text you want to translate...',
                    'id' => 'content',
                ),
                'options' => array(
                    'label' => 'Original Text',
                    'label_attributes' => array(
                        'class' => 'label-input100',
                        'for' => 'content',
                    ),
                ),
            ));
            
            $this->add(array(
                'type' => Select::class,
                'name' => 'targetLang',
                'options' => array(
                    'label' => 'Target Language',
                    'label_attributes' => array(
                        'class' => 'label-input100',
                        'for' => 'targetLang',
                    ),
                    'value_options' => $lng,
                ),
                'attributes' => array(
                    'value' => 'tr',
                    'id' => 'targetLang',
                    'required' => 'required'
                )
            ));
            $this->add(array(
                'name' => 'searchText',
                'attributes'=>array(
                    'class'=>'input100',
                    'placeholder'=>'Can enter any word',
                    'id' => 'searchText',
                ),
                'options' => array(
                    'label' => 'search word (preferably)',
                    'label_attributes' => array(
                        'class' => 'label-input100',
                        'for' => 'searchText',
                    ),
                ),
            ));
            $this->add(array(
                'name' => 'translateNow',
                'type' => 'button',
                'options'=>array(
                    'label'=>'Translate Now'
                ),
                'attributes'=>array(
                    'type'=>'submit',
                    'class'=>'contact100-form-btn',
                ),
    
            ));
        }
    }
    
    