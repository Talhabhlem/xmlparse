<?php

namespace Logger;

use Observer\IObservable;
use Observer\IObserver;
use Parser\FeedParserBase;

class InfoLogger implements IObserver
{
    public function notify(IObservable $objSource, $strMessage)
    {
        if ($objSource instanceof FeedParserBase) {
            $log_file = "info-logs.log";
            error_log($strMessage . "\n", 3, $log_file);
            printf(PHP_EOL . 'INFO -> %s', $strMessage . "\n");
        }
    }
}
