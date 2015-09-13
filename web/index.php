<?php

try {
    // This check prevents access to debug front controllers that are deployed by accident to production servers.
    // Feel free to remove this, extend it, or make something more sophisticated.
    //echo '<pre>';print_r($_SERVER);die;
    /*if (isset($_SERVER['HTTP_CLIENT_IP']) || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
            || !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1', 
                '192.168.10.239', '192.168.10.238', '192.168.0.7'))
    ) {
        header('HTTP/1.0 403 Forbidden');
        exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');
    }*/
    $appCore = new \Phady\Core\KernelMvc('dev', false, 'mvc',
			array(
				array('common' => array(
                    'className' => 'App\Common\Module',
                    'path' => __DIR__ . '/../src/common/Module.php'
                ))
           ));

    //Handle the request
    echo $appCore->getApplication()->handle()->getContent();
} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
}
