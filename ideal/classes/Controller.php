<?php
class Controller extends Singleton
{
    public $html;
    
    function __call($methodName, $args=array())
    {
		if(is_callable(array($this, $methodName))) {
			return call_user_func_array(array($this, $methodName), $args);
                } else {
		throw new Except('In controller '.get_called_class().' method '.$methodName.' not found!');
                }
    }
        
    public function renderPage($content)
    {
        $this->html .= include ROOT.'application/views/index/header.php';
        $this->html .= $content;
        $this->html .= include ROOT.'application/views/index/footer.php';
        echo $this->html;
    }
}
