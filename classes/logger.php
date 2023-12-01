<?php
class Logger
{
    private $logDir = 'storage/logs/';
    private $logFile;
    private $logLevel = 'info';

    public function __construct($logFileName = 'app.log')
    {
        $this->logFile = $this->logDir . $logFileName;
        $this->checkLogFile();
    }

   

    public function log($message, $level = 'info')
    {
        if ($this->isLogLevelValid($level)) {
            $logEntry = date('[Y-m-d H:i:s]') . " [$level] $message" . PHP_EOL;
            file_put_contents($this->logFile, $logEntry, FILE_APPEND);
        }
    }

    private function isLogLevelValid($level)
    {
        $validLogLevels = ['info', 'warning', 'error', 'debug'];

        return in_array($level, $validLogLevels);
    }

    private function checkLogFile()
    {
        if (!file_exists($this->logFile)) {
            $directory = dirname($this->logFile);
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }
            touch($this->logFile);
        }
    }
}
