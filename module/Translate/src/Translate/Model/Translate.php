<?php
    
    namespace Translate\Model;
    
    use RuntimeException;
    use Zend\InputFilter\InputFilter;
    use Zend\InputFilter\InputFilterAwareInterface;
    use Zend\InputFilter\InputFilterInterface;
    
    class Translate implements InputFilterAwareInterface
    {
        public    $targetLang;
        public    $content;
        public    $searchText;
        protected $inputFilter;
        
        public function exchangeArray($data): object
        {
            $this->targetLang = $data['targetLang'] ?? null;
            $this->content    = $data['content'] ?? null;
            $this->searchText = $data['searchText'] ?? null;
            return $this;
        }
        
        public function getInputFilter()
        {
            if(!$this->inputFilter){
                $inputFilter = new InputFilter();
                $inputFilter->add([
                    'name'     => 'targetLang',
                    'required' => true,
                    'filters'  => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                ]);
                $inputFilter->add([
                    'name'       => 'content',
                    'required'   => true,
                    'filters'    => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                    'validators' => [
                        [
                            'name'    => 'StringLength',
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min'      => 3,
                                'max'      => 5000,
                            ],
                        ],
                    ],
                ]);
                $inputFilter->add([
                    'name'     => 'searchText',
                    'required' => false,
                    'filters'  => [
                        ['name' => 'StripTags'],
                        ['name' => 'StringTrim'],
                    ],
                ]);
                $this->inputFilter = $inputFilter;
            }
            return $this->inputFilter;
        }
        
        public function setInputFilter(InputFilterInterface $inputFilter)
        {
            throw new RuntimeException('Not used');
        }
    }