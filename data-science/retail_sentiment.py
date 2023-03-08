import praw
from textblob import TextBlob

# Create a Reddit instance using your API credentials
reddit = praw.Reddit(client_id='YOUR_CLIENT_ID',
                     client_secret='YOUR_CLIENT_SECRET',
                     user_agent='YOUR_USER_AGENT')

# Define the subreddit and query terms to search for
subreddit = 'Forex'
query = 'USDCAD'

# Fetch comments matching the query from the subreddit
comments = []
for comment in reddit.subreddit(subreddit).search(query, sort='new', limit=100):
    comments.append(comment.body)

# Perform sentiment analysis on the comments using TextBlob
sentiment_scores = []
for comment in comments:
    blob = TextBlob(comment)
    sentiment_scores.append(blob.sentiment.polarity)

# Calculate the average sentiment score for the comments
average_sentiment = sum(sentiment_scores) / len(sentiment_scores)

# Print the average sentiment score
print(f'Average sentiment score for {query} comments on r/{subreddit}: {average_sentiment:.2f}')
