from yahoo_finance import Share
from pandas_datareader import data as web
import datetime

start = datetime.datetime(2010, 1 ,1)
end = datetime.date.today()

print "Enter the stock name"
name = raw_input()
print "Enter company name"
comp_name = raw_input()

f=web.DataReader("AAPL", "google", start, end)
stock = f.ix['2017-01-04']
print f.head()


#stock = Share(name)
#print stock.get_open()
#print stock.get_price()
#print stock.get_trade_datetime()
#print stock.get_historical('2014-01-01', '2017-03-22')
