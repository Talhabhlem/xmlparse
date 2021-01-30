<?php

namespace Logger;

use Observer\IObserver;
use Observer\IObservable;
use Parser\FeedParserBase;

class ErrorLogger implements IObserver
{
    public function notify(IObservable $objSource, $strMessage)
    {
        if ($objSource instanceof FeedParserBase) {
            $log_file = "error-logs.log";
            error_log($strMessage . "\n", 3, $log_file);
            printf(PHP_EOL . 'ERROR -> %s.' . PHP_EOL, $strMessage . "\n");
        }
    }
}
