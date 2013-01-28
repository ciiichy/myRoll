	<!-- #########################  lista klientow  #########################  -->
	<div class="panel">
    <div id="config_naglowek">
    </div>
    <div class="content conf">
    
	<?php include(sfConfig::get('sf_app_template_dir').'/configMenu.php') ?>
        
<div class="tablica">
        
        
       <div class="nag_conf_uz">Użytkownicy:</div>
        
        <table cellspacing=2 cellpadding=5>
        <tr>
        	<th class="cf_s1">login</th>
        	<th class="cf_s2">imię nazwisko</th>
        	<th class="cf_s3">uprawnienia</th>
        	<th class="cf_s4">edytuj</th>
       	 	<th class="cf_s5">usuń</th>
        </tr>
        </table>

		<div class="separator"></div>
        
        <table  cellspacing="2" cellpadding="5" >
        <?php foreach ($users as $u){ ?>
        <tr>
        	<td class="cf_s1 bold"><?php echo $u->getLogin() ?></td>
        	<td class="cf_s2 bold"><?php echo $u->getName() ?></td>
        	<td class="cf_s3 bold"><?php echo $u->getType() ?></td>
        	<td class="cf_s4 bold"><a href="<?php echo url_for('config/access?edit='.$u->getId()) ?>"><img src="/images/ico_edit.png" /></a></td>
       	 	<td class="cf_s5 bold"><a href="<?php echo url_for('config/access?delete='.$u->getId()) ?>"><img src="/images/ico_notok.png"  /></a></td>
        </tr>

        <?php } ?>
        </table>
 
        
			<form action="<?php echo url_for('config/access') ?>" method="post" id="config_form" name='vat_form'>
				<div class="separator2"></div>

                <div class="nag_conf">Dodaj użytkownika:</div>
   
       		<div id='msg'><?php echo "<br>".@$msg?></div>
			
				<?php echo $form ?>
                 <input type="image" src="/images/btt_zastosuj.png"  class="snd"'/>
			</form>
   
   
           
        </div>
        
    <!-- content koniec--></div>
    
	<!-- panel koniec --></div>
	<!-- #########################  koniec listy klientow  #########################  -->