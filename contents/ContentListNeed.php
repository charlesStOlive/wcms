<?php namespace Waka\Wcms\Contents;

use Backend\Classes\ControllerBehavior;

class ContentListNeed extends ControllerBehavior
{
    public $contentListNeedFormWidget;
	public function __construct($controller)
    {
        parent::__construct($controller);
        $this->contentListNeedFormWidget = $this->createContentListNeedFormWidget();
    }
    

    public function onLoadCreateListNeedForm()
    {
        $bloc = $this->controller->getBlocModel();

        $this->contentListNeedFormWidget->context = post('context');

        $this->vars['behaviorWidget'] = $this->contentListNeedFormWidget;
        $this->vars['orderId'] = post('manage_id');
        $this->vars['update'] = false;
        
        return [
            '#popupPublisherContent' =>$this->makePartial('$/waka/publisher/contents/form/_content_create_form.htm')
        ]; 
    }
    //
    public function onLoadUpdateListNeedForm()
    {
        $bloc = $this->controller->getBlocModel();
        //
        $recordId = post('record_id');
        $sk = post('_session_key');

        $this->contentListNeedFormWidget = $this->createContentListNeedFormWidget($recordId);
        $this->contentListNeedFormWidget->context = post('context');
       
        //
        $this->vars['behaviorWidget'] = $this->contentListNeedFormWidget;
        //
        $this->vars['orderId'] = post('manage_id');
        $this->vars['recordId'] = $recordId;
        $this->vars['update'] = true;
        //
        return [
            '#popupPublisherContent' =>$this->makePartial('$/waka/publisher/contents/form/_content_create_form.htm')
        ]; 
    }

    protected function createContentListNeedFormWidget($recordId=null)
    {
        $config = $this->makeConfig('$/waka/wcms/contents/compilers/listneed.yaml');
        $config->alias = 'contentListNeedForm';
        $config->arrayName = 'ListNeedForm';

        if(!$recordId) {
            $config->model = new \Waka\Publisher\Models\Content;
        } else {
            $config->model = \Waka\Publisher\Models\Content::find($recordId);
        }

        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $widget->bindToController();

        return $widget;
    }


    
}