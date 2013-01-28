    	<div id="menu_config">
    		
        	<a href="<?php echo url_for('config/config') ?>" id="btt_config_main<?php if (sfContext::getInstance()->getActionName() == 'config') echo '_bg'  ?>"></a>
<!--             <a href="<?php echo url_for('config/mailpay') ?>" id="btt_config_platnosci<?php if (sfContext::getInstance()->getActionName() == 'mailpay') echo '_bg'  ?>"></a>
            <a href="<?php echo url_for('config/mailend') ?>" id="btt_config_umowa<?php if (sfContext::getInstance()->getActionName() == 'mailend') echo '_bg'  ?>"></a> -->
            <a href="<?php echo url_for('config/access') ?>" id="btt_config_dostep<?php if (sfContext::getInstance()->getActionName() == 'access') echo '_bg'  ?>"></a>
    	</div>