<?php
// auto-generated by sfViewConfigHandler
// date: 2012/03/13 11:44:10
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'roll', false, false);

  $response->addStylesheet('style.css', '', array ());
  $response->addStylesheet('style_header.css', '', array ());
  $response->addStylesheet('style_listy.css', '', array ());
  $response->addStylesheet('style_panel.css', '', array ());
  $response->addStylesheet('style_statystyki.css', '', array ());
  $response->addJavascript('jquery-1.7.1.min.js', '', array ());
  $response->addJavascript('scripts.js', '', array ());

