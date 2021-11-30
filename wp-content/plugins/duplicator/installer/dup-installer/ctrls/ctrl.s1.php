<<<<<<< HEAD
<?php
defined('ABSPATH') || defined('DUPXABSPATH') || exit;

require_once($GLOBALS['DUPX_INIT'].'/ctrls/classes/class.ctrl.extraction.php');

$data = DUP_LITE_Extraction::getInstance()->runExtraction();
die(DupLiteSnapJsonU::wp_json_encode($data));
=======
<?php
defined('ABSPATH') || defined('DUPXABSPATH') || exit;

require_once($GLOBALS['DUPX_INIT'].'/ctrls/classes/class.ctrl.extraction.php');

$data = DUP_LITE_Extraction::getInstance()->runExtraction();
die(DupLiteSnapJsonU::wp_json_encode($data));
>>>>>>> 73c97709f14f5873fddf294e3b3459fb7688a68b
