import json
import pandas as pd
import matplotlib.pyplot as plt

tweets_data_path= 'tweetdata.txt'

tweets_data = []
tweets_file = open(tweets_data_path, "r")
for line in tweets_file:
 try:
    tweet = json.loads(line)
    tweets_data.append(tweet)
 except:
    continue


tweets = pd.DataFrame()
print tweets
tweets['text'] = [tweet.get('text','') for tweet in tweets_data]
tweets['lang'] = [tweet.get('lang','') for tweet in tweets_data]
tweets['country'] = [tweet.get('country','') for tweet in tweets_data]
#"
#tweets['lang'] = map(lambda tweet: tweet['lang'], tweets_data)
#tweets['country'] = map(lambda tweet: tweet['place']['country'] if tweet['place'] != None else None, tweets_data)


tweets_by_lang = tweets['text'].value_counts()

fig, ax = plt.subplots()
ax.tick_params(axis='x', labelsize=15)
ax.tick_params(axis='y', labelsize=10)
ax.set_xlabel('Languages', fontsize=15)
ax.set_ylabel('Number of tweets' , fontsize=15)
ax.set_title('Top 5 languages', fontsize=15, fontweight='bold')
tweets_by_lang[:5].plot(ax=ax, kind='bar', color='red')

tweets_by_country = tweets['country'].value_counts()

fig, ax = plt.subplots()
ax.tick_params(axis='x', labelsize=15)
ax.tick_params(axis='y', labelsize=10)
ax.set_xlabel('Countries', fontsize=15)
ax.set_ylabel('Number of tweets' , fontsize=15)
ax.set_title('Top 5 countries', fontsize=15, fontweight='bold')
tweets_by_country[:5].plot(ax=ax, kind='bar', color='blue')
       
