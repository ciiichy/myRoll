<!-- #########################  lista klientow  #########################  -->
	<div class="panel">
    <div id="listaumow_naglowek">
    	<!-- <a href="dododajumowe.php" class="add_dodaj"></a> -->
    </div>
    <div class="content">
    
        <form class="search" method="post" action="/contract/list"> wyszukaj: <input type="text" name="phrase"/> </form>
             
    	<div class="tablica">
                <div id='msg'><?php echo "<br>".@$msg?></div>
        <!-- tresc generowana listaumow -->
        
        <table cellspacing=2 cellpadding=5>
        <tr>
        	<th class="s25a">produkt</th>
        	<th class="s26a">klient</th>
        	<th class="s27">od:</th>
        	<th class="s28">do:</th>
        	<th class="s29">edytuj</th>
       	 	<th class="s30">usuń</th>
        </tr>
        </table>

		<div class="separator"></div>
        
        <table  cellspacing="2" cellpadding="5">
        <?php foreach ($contracts as $c) { ?>
        <tr id='contract_<?php echo $c->getId()?>'>
        	<td class="s25"><?php echo $c->getProduct()->getName()?></td>
        	<td class="s26"><?php echo $c->getClients()->getName()?></td>
        	<td class="s27"><?php echo $c->getDateFrom()?></td>
        	<td class="s28"><?php echo $c->getDateTo()?></th>
            <td class="s29"><a href="#" class="edit_contract" name="<?php echo $c->getId()?>"><img src="/images/ico_edit.png"  /></a></td>
        	<td class="s30"><a href="#" class="delete_contract" name="<?php echo $c->getId()?>"><img src="/images/ico_notok.png"  /></a></td>
        </tr>
        <?php } ?>
        
        </table>
        <script>
        		$(document).ready(function() {
	$(".delete_contract").click(function() {
		id = $(this).attr('name');
		$.ajax({
			type: 'post',
			url : "<?php echo url_for('contract/delete')?>",
			data: 	{'id':id},
			success: function(){
				$('#contract_'+id).hide('slow');
			},
				error : function(){
				alert('Blad')
			}		
			
		})	

});
	
});
        </script>         
        <!-- tresc generowana listaumow koniec -->  
              
        </div>
    	<a href="/contract/list/act/showall" class="pokazwszystkie"></a>
    <!-- content koniec--></div>
    
	<!-- panel koniec --></div>
	<!-- #########################  koniec listy klientow  #########################  -->