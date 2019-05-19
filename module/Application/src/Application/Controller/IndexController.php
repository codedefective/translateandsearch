<?php
    
    namespace Application\Controller;
    
    use Application\Form\SearchForm;
    use Zend\Mvc\Controller\AbstractActionController;
    use Zend\View\Model\ViewModel;
    
    class IndexController extends AbstractActionController
    {
        public function indexAction() : ViewModel{
            $form = new SearchForm();
         
            return new ViewModel([
                'form' => $form
            ]);
        }
    }
