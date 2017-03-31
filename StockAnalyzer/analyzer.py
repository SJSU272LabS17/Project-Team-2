import datetime as dt
import matplotlib.pyplot as plt
import matplotlib 
import pandas as pand
import pandas_datareader as rdata

matplotlib.style.use('ggplot')
start = dt.datetime(2010,1,1)
end = dt.datetime.now()
dataframe = rdata.DataReader('AAPL', "google", start, end)

#print rdata.get_data_google('AAPL')

#print dataframe.ix['2016-03-30']

dataframe.to_csv('AAPL.csv')

datagraph = pand.read_csv('AAPL.csv', parse_dates=True, index_col=0)

#datagraph.plot()
#plt.show()

datagraph[['High', 'Low']].plot()

datagraph['100ma'] = datagraph[['Close']].rolling(window=100, min_periods=0).mean()
print(datagraph.head())

ax1 = plt.subplot2grid((6,1), (0,0), rowspan=5, colspan=1)
ax2 = plt.subplot2grid((6,1), (5,0), rowspan=1, colspan=1, sharex=ax1)

ax1.plot(datagraph.index, datagraph['Close'])
ax1.plot(datagraph.index, datagraph['100ma'])
ax2.bar(datagraph.index, datagraph['Volume'])

plt.show()







