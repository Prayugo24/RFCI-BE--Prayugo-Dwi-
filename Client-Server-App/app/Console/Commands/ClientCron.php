<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
/*Load Component*/
use Illuminate\Support\Facades\URL;
use Cache;




class ClientCron extends Command
{
  /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ClientCron:ClientCron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron untuk generate ClientCron';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        { #HIT
            $logFile = 'server.log';
            $pathLog = storage_path('logs/cron/');
            $filename = $pathLog.'/'.$logFile;
            $orderLog = new Logger('Success');
            $orderLog->pushHandler(new StreamHandler($filename), Logger::INFO);
            $response['response'] = [];
            $response['hit_date'] = [];
            $counter = 1;
            $url =  URL::current();
            if(file_exists($filename)){
                $content = file_get_contents($filename);
                $getLog = [];
                if(!empty($content)) preg_match_all("/{([^\s]+)/", $content, $getLog);
                $dataLog = ($getLog[0]);
                
                foreach($dataLog as $dataV){
                    $jsonData = json_decode($dataV, TRUE);
                    $counter = $jsonData['counter']+1;
                }
                $log = [
                    'counter' => $counter,
                    'X-RANDOM' => str_random(32)
                ];
                $orderLog->info($url, $log);
            }else{
                $log = [
                    'counter' => $counter,
                    'X-RANDOM' => str_random(32)
                ];
                $orderLog->info($url, $log);
            } 
            
            $this->saveLogrespon(($log));
        } #END HIT
        return $log;
    } 

    public function saveLogrespon($response){
        $logFile = 'server.log';
        $pathLog = storage_path('logs/cron/');
        $filename = $pathLog.'/'.$logFile;
        $orderLog = new Logger('Success');
        $orderLog->pushHandler(new StreamHandler(storage_path('logs/'.$logFile)), Logger::INFO);
        $url =  URL::current();
        $orderLog->info($url, $response);
    }
}

