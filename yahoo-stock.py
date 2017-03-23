from yahoo_finance import Share
print "Enter the stock name"
name = raw_input()
stock = Share(name)
print stock.get_open()
print stock.get_price()
print stock.get_trade_datetime()
print stock.get_historical('2014-01-01', '2017-03-22')
