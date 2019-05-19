<?php
    
    namespace Translate\Controller;

    use Application\Form\SearchForm;
    use Google\Cloud\Translate\TranslateClient;
    use Translate\Model\Translate;
    use Zend\Mvc\Controller\AbstractActionController;
    use Zend\View\Model\ViewModel;

    class TranslateController extends AbstractActionController
    {
        public function indexAction()
        {
            $this->layout('translate/index');
            $form = new SearchForm();
            $request = $this->getRequest();
            if ($request->isPost()) {
                $translate = new Translate();
                $form->setInputFilter($translate->getInputFilter());
                $form->setData($request->getPost());
                if ($form->isValid()) {
                    $postData = $request->getPost();
                    $translate = new TranslateClient();
                    $detect = $translate->detectLanguage($postData->content,[
                        'key'    => 'AIzaSyCb2FHhpl7uvffSj05gbIM11hrukSl9gS4'
                    ]);
                    
                    $langName = $translate->localizedLanguages([
                        'target' => 'tr',
                        'key'    => 'AIzaSyCb2FHhpl7uvffSj05gbIM11hrukSl9gS4'
                    ]);
                    
                    
                    $result = $translate->translate(nl2br($postData->content), [
                        'target' => $postData->targetLang,
                        'key'    => 'AIzaSyCb2FHhpl7uvffSj05gbIM11hrukSl9gS4'
                    ]);
                    $detectLangKey = array_search($detect['languageCode'], array_column($langName, 'code'), true);
                    $targetLangKey = array_search($postData->targetLang, array_column($langName, 'code'), true);
                    
                    return new ViewModel([
                        'detect'  => $langName[$detectLangKey],
                        'translated'  => $langName[$targetLangKey],
                        'result'  => $result,
                        'search'  => $postData->searchText ?? false,
                    ]);
                }
                return $this->redirect()->toRoute('home');
            }
    
    
            return $this->redirect()->toRoute('home');
        }
       
    }