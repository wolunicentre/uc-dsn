<?php

global $conmem;
global $confeed;

// Setup Database Connections
putenv('ORACLE_HOME=/packages/oracle/9.2.0.1.0');
putenv('ORA_NLS33=/packages/oracle/9.2.0.1.0/ocommon/nls/admin/data');
$host = '(DESCRIPTION =(ADDRESS =(PROTOCOL = TCP)(HOST = corfu.its.uow.edu.au)(PORT = 1521))(CONNECT_DATA = (SID = NUIT)))';
$confeed = OCILogon("ucfeedback", "ucf33db4ck", $host);	
$concon = OCILogon("uowconf", "u0wc0nf", $host);

?>
