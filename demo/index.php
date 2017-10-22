<?php
//error_reporting(0);
require './vendor/autoload.php';
$api = new BinanceClientAPI\API("FMFwgZAdNfPseNSVe4mpaRgb1tpiQJ4RfAo7XmKVpWzsJleCEl3QDB2BhW78OpSH","AD3x82U2FrEWXnnVZtptRwAHcE8CBubJkqHYz7mLHvOXvUhNuNpMjUoBTUWMYghK");

// Get latest price of a symbol
//echo "<h3>getPrices()</h3>";
//$ticker = $api->getPrices();
//echo "<pre>".print_r($ticker,true)."</pre>";

//echo "<hr>";

// Get all of your positions, including estimated BTC value
//echo "<h3>getBalances()</h3>";
//$balances = $api->getBalances($ticker);
//echo "<pre>".print_r($balances,true)."</pre>";

//echo "<hr>";

// Get all bid/ask prices
//echo "<h3>getBookPrices()</h3>";
//$bookPrices = $api->getBookPrices();
//echo "<pre>".print_r($bookPrices,true)."</pre>";

//echo "<hr>";

//Place a LIMIT order
//$quantity = 1;
//$price = 0.0005;
//$pair = "BNBBTC";
//$order = $api->buyOrder($pair, $quantity, $price);

//Place a MARKET order
//$quantity = 1;
//$pair = "BNBBTC";
//$order = $api->buyOrder($pair, $quantity, 0, "MARKET");

// Place a STOP LOSS order
// When the stop is reached, a stop order becomes a market order
//$quantity = 1;
//$price = 0.5; // Target btc sell value
//$stopPrice = 0.4; // Sell immediately if price goes below 0.4 btc
//$pair = "BNBBTC";
//$order = $api->sellOrder($pair, $quantity, $price, "LIMIT", ["stopPrice"=>$stopPrice]);
//echo "<pre>".print_r($order,true)."</pre>";

// Place an ICEBERG order
// Iceberg orders are intended to conceal the true order quantity.
//$quantity = 1;
//$price = 0.5;
//$icebergQty = 10;
//$pair = "BNBBTC";
//$order = $api->sellOrder($pair, $quantity, $price, "LIMIT", ["icebergQty"=>$icebergQty]);
//echo "<pre>".print_r($order,true)."</pre>";

//echo "<hr>";

// Get Market Depth
//echo "<h3>getDepth()</h3>";
//$pair="ETHBTC";
//$depth = $api->getDepth($pair);
//echo "<pre>".print_r($depth,true)."</pre>";

//echo "<hr>";

// Get Open Orders 
//echo "<h3>getOpenOrders()</h3>";
//$pair="BTCUSDT";
//$openorders = $api->getOpenOrders($pair);
//echo "<pre>".print_r($openorders,true)."</pre>";

//echo "<hr>";

// Get Order Status
//echo "<h3>getOrderStatus()</h3>";
//$orderid = <orderid>;
//$pair="BTCUSDT";
//$orderstatus = $api->getOrderStatus($pair, $orderid);
//echo "<pre>".print_r($orderstatus,true)."</pre>";

//echo "<hr>";

// Cancel an Order
//echo "<h3>cancelOrder()</h3>";
//$pair="BTCUSDT";
//$orderid = "2806143";
//$response = $api->cancelOrder($pair, $orderid);
//echo "<pre>".print_r($response,true)."</pre>";

//echo "<hr>";

// Get Trade History
//echo "<h3>getHistoryOrders()</h3>";
//$pair="ETHBTC";
//$history = $api->getHistoryOrders($pair);
//echo "<pre>".print_r($history,true)."</pre>";

//echo "<hr>";

// Get Kline/candlestick data for a symbol
// Periods: 1m,3m,5m,15m,30m,1h,2h,4h,6h,8h,12h,1d,3d,1w,1M
//echo "<h3>getCandleSticks()</h3>";
//$interval="15m";
//$pair="ETHBTC";
//$ticks = $api->getCandleSticks($pair, $interval);
//echo "<pre>".print_r($ticks,true)."</pre>";

//echo "<hr>";

// Aggregate Trades List
//echo "<h3>getAggTrades()</h3>";
//$pair="ETHBTC";
//$trades = $api->getAggTrades($pair);
//echo "<pre>".print_r($trades,true)."</pre>";

// Trade Updates via WebSocket
//$api->getTradesA(["BTCUSDT"], function($api, $symbol, $trades) {
//    echo "{$symbol} trades update".PHP_EOL;
//    echo "<pre>".print_r($trades,true)."</pre></br><hr>";
//});

// Get complete realtime chart data via WebSockets
//$api->getChart(["BNBBTC"], "15m", function($api, $symbol, $chart) {
//    echo "{$symbol} chart update\n";
//    echo "<pre>".print_r($chart,true)."</pre>";
//});

// Grab realtime updated depth cache via WebSockets
/*
$api->depthCache(["BNBBTC"], function($api, $symbol, $depth) {
    echo "{$symbol} depth cache update\n";
    $limit = 10; // Show only the closest asks/bids
    $sorted = $api->sortDepth($symbol, $limit);
    $bid = $api->first($sorted['bids']);
    $ask = $api->first($sorted['asks']);
    echo $api->displayDepth($sorted);
    echo "ask: {$ask}</br>";
    echo "bid: {$bid}</br><hr>";
});
*/


?>