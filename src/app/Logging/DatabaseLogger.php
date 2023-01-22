<?php
namespace App\Logging;
use Monolog\Logger;

class DatabaseLogger{
    /**
     * Create a custom Monolog instance.
     *
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config){
        $logger = new Logger("DatabaseLoggingHandler");
        return $logger->pushHandler(new DatabaseLoggingHandler());
    }
}
