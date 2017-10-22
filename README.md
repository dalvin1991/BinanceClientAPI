# PHP Binance API
This PHP plugin can hep you integrate with the Binance Excahnge API easier. Binance API: https://www.binance.com/restapipub.html

#### Installation
```
*Note Require you to install composer which can found in https://getcomposer.org/

composer require dalvin1991/binance_client_api
```

#### Getting started
```php
require 'vendor/autoload.php'; //the directory of the autoload.php in vendor folder 
$api = new BinanceClientAPI\API("<api key>","<secret>"); //the initialize of the API instance
```

#### Get latest price for each cryptocurrency
```php
echo "<h3>getPrices()</h3>";
$ticker = $api->getPrices();
echo "<pre>".print_r($ticker,true)."</pre>";
```

#### Get all of your balance for all cryptocurrency
```php
echo "<h3>getBalances()</h3>";
$balances = $api->getBalances($ticker);
echo "<pre>".print_r($balances,true)."</pre>";
```

#### Get all of cryptocurrency bid/ask prices
```php
echo "<h3>getBookPrices()</h3>";
$bookPrices = $api->getBookPrices();
echo "<pre>".print_r($bookPrices,true)."</pre>";
```

#### Place a Buy LIMIT order
```php
$quantity = 1;
$price = 0.0005;
$pair = "BNBBTC";
$order = $api->buyOrder($pair, $quantity, $price);
```

#### Place a Sell LIMIT order
```php
$quantity = 1;
$price = 0.0005;
$pair = "BNBBTC";
$order = $api->sellOrder($pair, $quantity, $price);
```

#### Place a Buy MARKET order
```php
$quantity = 1;
$pair = "BNBBTC";
$order = $api->buyOrder($pair, $quantity, 0, "MARKET");
```

#### Place a Sell MARKET order
```php
$quantity = 1;
$pair = "BNBBTC";
$order = $api->buyOrder($pair, $quantity, 0, "MARKET");
```

#### Place a STOP LOSS order
```php
$quantity = 1;
$price = 0.5; // Target btc sell value
$stopPrice = 0.4; // Sell immediately if price goes below 0.4 btc with market order
$pair = "BNBBTC";
$order = $api->sellOrder($pair, $quantity, $price, "LIMIT", ["stopPrice"=>$stopPrice]);
echo "<pre>".print_r($order,true)."</pre>";
```

#### Place an ICEBERG order
```php
$quantity = 1;
$price = 0.5;
$icebergQty = 10;
$pair = "BNBBTC";
$order = $api->sellOrder($pair, $quantity, $price, "LIMIT", ["icebergQty"=>$icebergQty]);
echo "<pre>".print_r($order,true)."</pre>";
```

#### Complete History Complete Trade
```php
echo "<h3>getHistoryOrders()</h3>";
$pair="ETHBTC";
$history = $api->getHistoryOrders($pair);
echo "<pre>".print_r($history,true)."</pre>";
```

#### Get Market Depth
```php
echo "<h3>getDepth()</h3>";
$pair="ETHBTC";
$depth = $api->getDepth($pair);
echo "<pre>".print_r($depth,true)."</pre>";
```

#### Get Open Orders
```php
echo "<h3>getOpenOrders()</h3>";
$pair="BTCUSDT";
$openorders = $api->getOpenOrders($pair);
echo "<pre>".print_r($openorders,true)."</pre>";
```

#### Get Order Status
```php
echo "<h3>getOrderStatus()</h3>";
$orderid = <orderid>; //orderid can get from getOpenOrders() method
$pair="BTCUSDT";
$orderstatus = $api->getOrderStatus($pair, $orderid);
echo "<pre>".print_r($orderstatus,true)."</pre>";
```

#### Cancel an Order
```php
echo "<h3>cancelOrder()</h3>";
$pair="BTCUSDT";
$orderid = <orderid>; //orderid can get from getOpenOrders() method
$response = $api->cancelOrder($pair, $orderid);
echo "<pre>".print_r($response,true)."</pre>";
```

#### Aggregate Trades List
```php
echo "<h3>getAggTrades()</h3>";
$pair="ETHBTC";
$trades = $api->getAggTrades($pair);
echo "<pre>".print_r($trades,true)."</pre>";
```

#### Get ALl Order (active, canceled, filled) for the pair requested
```php
$pair="BTCUSDT";
$orders = $api->getOrders($pair);
echo "<pre>".print_r($orders,true)."</pre>";
```

#### Get candlestick data for the pair requested.
```php
//Interval: 1m,3m,5m,15m,30m,1h,2h,4h,6h,8h,12h,1d,3d,1w,1M
echo "<h3>getCandleSticks()</h3>";
$interval="15m";
$pair="ETHBTC";
$ticks = $api->getCandleSticks($pair, $interval);
echo "<pre>".print_r($ticks,true)."</pre>";
```

## WebSocket API

#### Realtime Chart Cache via WebSockets
```php
$api->getChart(["BNBBTC"], "15m", function($api, $symbol, $chart) {
    echo "{$symbol} chart update\n";
    echo "<pre>".print_r($chart,true)."</pre>";
//});
```

#### Trade Updates via WebSocket
```php
$api->trades(["BNBBTC"], function($api, $symbol, $trades) {
    echo "{$symbol} trades update".PHP_EOL;
    print_r($trades);
});
```


#### Realtime updated depth cache via WebSockets
```php
$api->depthCache(["BNBBTC"], function($api, $symbol, $depth) {
	//the depth value is inside the $depth
    echo "{$symbol} depth cache update\n";
    $limit = 10; // Show how many depth level for asks/bids
    $sorted = $api->sortDepth($symbol, $limit);
    $bid = $api->first($sorted['bids']);
    $ask = $api->first($sorted['asks']);
    echo $api->displayDepth($sorted);
    echo "ask: {$ask}</br>";
    echo "bid: {$bid}</br><hr>";
});
```

#### Get realtime updated depth cache via WebSockets
```php
$api->depthCache(["BNBBTC"], function($api, $symbol, $depth) {
	//the depth value is inside the $depth
    echo "{$symbol} depth cache update\n";
    $limit = 10; // Show how many depth level for asks/bids
    $sorted = $api->sortDepth($symbol, $limit);
    $bid = $api->first($sorted['bids']);
    $ask = $api->first($sorted['asks']);
    echo $api->displayDepth($sorted);
    echo "ask: {$ask}</br>";
    echo "bid: {$bid}</br><hr>";
});
```

#### Get realtime chart data via WebSockets
```php
//Interval: 1m,3m,5m,15m,30m,1h,2h,4h,6h,8h,12h,1d,3d,1w,1M
$api->getChart(["BNBBTC"], "15m", function($api, $symbol, $chart) {
    echo "{$symbol} chart update\n";
    echo "<pre>".print_r($chart,true)."</pre>";
});
```

#### Get realtime updated done trade data via WebSockets
```php
$api->getTradesA(["BTCUSDT"], function($api, $symbol, $trades) {
    echo "{$symbol} trades update".PHP_EOL;
    echo "<pre>".print_r($trades,true)."</pre></br><hr>";
});
```