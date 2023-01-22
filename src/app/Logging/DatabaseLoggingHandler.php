<?php
namespace App\Logging;
use DB;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

class DatabaseLoggingHandler extends AbstractProcessingHandler{
    /**
     *
     * Reference:
     * https://github.com/markhilton/monolog-mysql/blob/master/src/Logger/Monolog/Handler/MysqlHandler.php
     */
    public function __construct($level = Logger::DEBUG, $bubble = true) {
        $this->table = 'cst_323_milestone_log';
        parent::__construct($level, $bubble);
    }
    protected function write(array $record):void
    {

        $data = array(
            'message'       => $record['message'],
            'context'       => json_encode($record['context']),
            'level'         => $record['level'],
            'level_name'    => $record['level_name'],
            'channel'       => $record['channel'],
            'record_datetime' => $record['datetime']->format('Y-m-d H:i:s'),
            'created_at'    => date("Y-m-d H:i:s"),
        );

        DB::connection()->table($this->table)->insert($data);
    }
}
