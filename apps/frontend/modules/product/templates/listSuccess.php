
	<!-- #########################  lista klientow  #########################  -->
	<div class="panel">
    <div id="listaproduktow_naglowek">
    	<!-- <a href="dodajprodukt.php" class="add_dodaj"></a> -->
    </div>
    <div class="content">
    
         <form class="search" method="post" action="/product/list"> wyszukaj: <input type="text" name="phrase"/> </form>
            
    	<div class="tablica">
        
        <!-- tresc generowana listaproduktow -->
        
        <table cellspacing=2 cellpadding=5>
        <tr>
        	<th class="s19">nazwa / opis</th>
        	<th class="s20">cena</th>
        	<th class="s21">jednostka</th>
        	<th class="s22">liczba<br />umów</th>
        	<th class="s23">edycja</th>
       	 	<th class="s24">usuń</th>
        </tr>
        </table>

		<div class="separator"></div>
        
        <table  cellspacing=2 cellpadding=5>
        <?php foreach($products as $p) {  ?>
        <tr id='product_<?php echo $p->getId()?>'>
        	<td class="s19">
            <h1 class="nazwa2"><?php  echo $p->getName() ?></h1>
            <p>
				<?php echo $p->getDescription() ?>
            </p>
            </td>
        	<td class="s20"><?php echo $p->getPrize() ?></td>
        	<td class="s21"><?php echo $p->getMonth() ?> msc.</td>
        	<td class="s22"><?php echo $p->getAmountContracts() ?> </th>
        	<td class="s23"><a href="#" class='edit_product' name='<?php echo $p->getId()?>'><img src="/images/ico_edit.png"  /></a></td>
       	 	<td class="s24"><a href="#" class='delete_product' name='<?php echo $p->getId()?>'><img src="/images/ico_notok.png"  /></a></td>
        </tr>
       	<? } ?>
        </table>
	        
	        <script>
	        		$(document).ready(function() {
		$(".delete_product").click(function() {
			id = $(this).attr('name');
			$.ajax({
				type: 'post',
				url : "<?php echo url_for('product/delete')?>",
				data: 	{'id':id},
				success: function(data1){
					$('#product_'+id).hide('slow');
				},
					error : function(){
					alert('Blad')
				}		
				
			})	
	
	});
		
	});
	        </script>
        
        <!-- tresc generowana listaproduktow koniec -->  
              
        </div>
    	<a href="/product/list/act/showall" class="pokazwszystkie"></a>
    <!-- content koniec--></div>
    
	<!-- panel koniec --></div>
	<!-- #########################  koniec listy klientow  #########################  -->
    

  