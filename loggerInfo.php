<?php

namespace home;

class loggerInfo
{
    function info($_strMessage)
    {
        $info_logger = new \Logger\InfoLogger();
        $_strFeedUrl = "products.xml";
        $asd = new ProductsParsing($_strFeedUrl);
        $info_logger->notify($asd, $_strMessage);
    }

    function error($_strMessage)
    {
        $info_logger = new \Logger\ErrorLogger();
        $_strFeedUrl = "products.xml";
        $asd = new ProductsParsing($_strFeedUrl);
        $info_logger->notify($asd, $_strMessage);
    }
}