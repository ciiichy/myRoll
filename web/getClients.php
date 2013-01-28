<?php
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);
#sfContext::createInstance($configuration)->dispatch();


foreach(Clients::getAll() as $c){
	 echo $c->name;
 }

return 'abc';

?>