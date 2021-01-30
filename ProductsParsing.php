<?php

namespace home;
require_once 'loggerInfo.php';

use Parser\FeedParserBase;

class ProductsParsing extends FeedParserBase
{
    public function __construct($_strFeedUrl)
    {
        parent::__construct($_strFeedUrl);
    }

    function parse()
    {
        $logger = new loggerInfo();
        $logger->info('start');
        try {
            $xml = simplexml_load_file(parent::getFeedUrl());

            if ($xml === false) {
                $logger->error("feed not found");
            } else {
                if (count($xml->children()) == 0) {
                    $logger->error("empty feed");
                } else {
                    foreach ($xml as $key => $Record) {
                        if (!empty($Record->title)) {
                            echo PHP_EOL . "name: " . (string)$Record->title . PHP_EOL;
                        } else {
                            $logger->error("incorrect item");
                        }

                        echo "id: " . (string)$Record->id . PHP_EOL;

                        if (!empty($Record->link)) {
                            echo "link: " . (string)$Record->link . PHP_EOL;
                        } else {
                            $logger->error("incorrect item");
                        }
                        echo "date: " . (string)$Record->pubDate . PHP_EOL;
                        echo "======================================================";
                    }
                    echo PHP_EOL;
                    $product_array = json_decode(json_encode($xml), TRUE);
                    return $product_array;
                }
            }
        } catch (\Exception $e) {
            $logger->error($e->getMessage());
        } finally {
            $logger->info('end');
        }
    }
}