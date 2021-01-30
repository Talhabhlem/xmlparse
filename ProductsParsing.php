<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 29/01/2021
 * Time: 8:40 PM
 */
use Parser\FeedParserBase;

class ProductsParsing extends FeedParserBase
{
    public function __construct($strFeedUrl)
    {
        $_strFeedUrl = "products.xml";
        parent::__construct($_strFeedUrl);
    }

    function parse()
    {
        // TODO: Implement parse() method.
        $_strFeedUrl = "products.xml";
        $info_logger = new \Logger\InfoLogger();
//        $info_logger->notify(*******,'start');

//        $log_file = "my-errors.log";
//        error_log($error_message, 3, $log_file);

        $xml = simplexml_load_file($_strFeedUrl);

        if ($xml === false) {
            echo "Failed loading XML: ";
            foreach(libxml_get_errors() as $error) {
                echo "<br>", $error->message;
            }
        } else {
            foreach ($xml as $key => $Record) {
                echo "name: ".(string)$Record->title.PHP_EOL;
                echo "<br>";
                echo "id: ".$key.PHP_EOL;
                echo "<br>";
                echo "link: ".(string)$Record->link.PHP_EOL;
                echo "<br>";
                echo "date: ".(string)$Record->pubDate.PHP_EOL;
                echo "<br>";
                echo "<br>";
                echo "======================================================";
                echo "<br>";
            }
        }
//        $info_logger->notify(FeedParserBase(),'end');
    }
}