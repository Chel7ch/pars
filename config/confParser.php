<?php

require_once('../resources/index.php');

use Config\Config;
use Config\IoC;

Config::set('levels', 3); // number of Spider pass levels
Config::set('multiRequest', 5); // number of parallel requests
Config::set('outputWithUrl',0); // 1 - turn on add a column with url to output
Config::set('saveHTMLPage', 1); // 1 - save in storage html page
Config::set('writeLogs', 1); // 1 - true for spider and spiderGroup,  -1 - true for parserPage
Config::set('writeBenefitInFile', 0); // 1 - record benefits in file
Config::set('connectDB', 0); // 1 - turn on writing in DB
Config::set('proxyOn', 1); // 1 - turn on proxy
Config::set('curlHTTPInfo', 1); // 1 - turn on Curl HTTP_InFo, 2 - detailed Curl HTTP_InFo
Config::set('respTimeout', 5); // number of seconds timeout
Config::set('connentTimeout', 4); //number of seconds connect timeout
Config::set('postData', 'login=qwe&password=qwe');
Config::set('userAgent', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0');
//Config::set('referer', 'http://diesel.elcat.kg/');



$clientHTTP = Ioc::resolve('http', 'webDriver');
//$clientHTTP = Ioc::resolve('http', 'curl');
//$filterLinks = Ioc::resolve('filterlinks', 'paginator');
$filterLinks = Ioc::resolve('filterlinks', 'main');
//$filterLinks = Ioc::resolve('filterlinks', 'url_tail_links');
//$prepOutput = Ioc::resolve('output', 'hidemy');
$prepOutput = Ioc::resolve('output', 'turn');
//$prepOutput = Ioc::resolve('output', 'straight');
$DB = new \DB\DBPdoExecute(Ioc::resolve('store', 'mysql'));
