<?php
echo 'BEFORE::<br>';
echo 'memory_limit::'.ini_get('memory_limit').'<br>';
echo 'max_execution_time::'.ini_get('max_execution_time').'<br>';
ini_set('memory_limit', '1024M');
set_time_limit(300);
echo 'AFTER::<br>';
echo 'memory_limit::'.ini_get('memory_limit').'<br>';
echo 'max_execution_time::'.ini_get('max_execution_time').'<br>';
?>