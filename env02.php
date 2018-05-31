<?php
  if (false !== ($computerName = getenv('COMPUTERNAME')) && $computerName == 'JEREMY-PC')
    echo '[!'.$computerName.']';
?>