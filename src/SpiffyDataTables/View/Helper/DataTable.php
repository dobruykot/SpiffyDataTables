<?php

namespace SpiffyDataTables\View\Helper;
use Zend\Json\Encoder,
	Zend\View\Helper\HtmlElement;

class DataTable extends HtmlElement
{
    protected static $loaded = false;
    
	public function __invoke($id, array $attribs = array(), array $dataOpts = array())
	{
	    $this->load();
        $attribs['id'] = $id;
        
        $js = "$('#{$id}').dataTable(";
        $js.= Encoder::encode($dataOpts);
        $js.= ");";
        
        $this->view->inlineScript()->appendScript($js);
        
        return sprintf('<table%s></table>', $this->_htmlAttribs($attribs));
	}
    
    protected function load()
    {
        if (self::$loaded) {
            return;
        }
        
        $this->view->inlineScript()->appendFile('/js/SpiffyDataTables/jquery.dataTables.min.js');
        
        self::$loaded = true;
    }
}