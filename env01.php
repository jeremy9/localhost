<?php
  if (false !== ($computerName = getenv('COMPUTERNAME')))
    echo '['.$computerName.']';
?>