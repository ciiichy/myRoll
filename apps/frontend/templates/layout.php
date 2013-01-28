<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>roLL</title>
    <?php include_http_metas() ?> 
    <?php include_metas()?>
    <?php include_title()?>
     <?php include_stylesheets();?>
     <?php include_javascripts() ?>
      
</head>
<?php
$module = $sf_context->getModuleName(); 
if ($module == 'login') echo '<body class="login">';
else{ ?>
<body>
	

	
<div id="container">
	<!-- #########################  nagłówek  #########################  -->
	<div id="head">

    	<a href="<?php echo url_for('main')  ?>"><div id="logo"></div></a>
        
    	<div id="btts_umowa">
       	  <a href="/contract/list" id="btt_umowa"></a>
            	<a href="#" id='add_contract' class="btt_dodaj" ></a>
            	<a href="/contract/list" class="btt_lista"></a>
    	</div>
    
    	<div id="btts_klient">
            	<a href="/client/list" id="btt_klient"></a>
            	<a href="#" class="btt_dodaj" id='add_client'></a>
            	<a href="/client/list" class="btt_lista"></a>
    	</div>
        
    	<div id="btts_produkt">
       	  <a href="/product/list" id="btt_produkt"></a>
            	<a href="#" class="btt_dodaj" id='add_product' ></a>
            	<a href="/product/list" class="btt_lista"></a>
    	</div>
        
    	<a href="<?php echo url_for('config/config') ?>" id="btt_config"></a>
    	<!-- <a href="statystyki.php" id="btt_stats"></a> -->
        
      <div id="przeterminowaneplatnosci" class="redbold">(0)</div>
        <div id="aktualnadata" class="redbold"><?php echo date("Y-m-d") ?></div>
        
	<!-- head --></div>
<?php }echo $sf_content ?>
<!-- container --></div>

</body>

</html>

 
</html>