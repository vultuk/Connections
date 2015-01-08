<?php require 'vendor/autoload.php';


    $config = new \Vultuk\Connections\Facades\Config\Native();
    $config->set([
        'Testing' => [
            'PostTestServerCom' => [
                'directory' => 'vultuk_connections_directory',
            ]
        ]
    ]);

    $result = \Vultuk\Connections\Connect::to('Testing.PostTestServerCom', $config)
        ->setData(['Super'=>'Test', 'Woop' => 'Working'])
        ->send();

    var_dump($result);
