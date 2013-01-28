	<!-- #########################  lista klientow  #########################  -->
	<div class="panel">
    <div id="config_naglowek">
    </div>
    <div class="content conf">
    
		<?php include(sfConfig::get('sf_app_template_dir').'/configMenu.php') ?>
        
    	<div class="tablica">
    		<div id='msg'><?php echo "<br>".@$msg?></div>
			<form action="<?php echo url_for('config/config') ?>" method="post" id="config_form" name='vat_form'>
				<div class="nag_conf">Definiowanie stawki VAT:</div>
				<?php echo $form_vat ?>
                 <input type="image" src="/images/btt_zastosuj.png"  class="snd"'/>
			</form>

				<div class="separator2"></div>
			<form action="<?php echo url_for('config/config') ?>" method="post" id="config_form" name='vat_form'>
				<div class="nag_conf">Definiowanie adresu administratora:</div>
    
				<?php echo $form_email ?>
                 <input type="image" src="/images/btt_zastosuj.png"  class="snd"'/>
			</form>             
        </div>
        
    <!-- content koniec--></div>
    
	<!-- panel koniec --></div>
	<!-- #########################  koniec listy klientow  #########################  -->