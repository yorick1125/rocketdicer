import yfinance as yf
import pandas as pd

# Define the stock ticker for USD/CAD
ticker = 'USDCAD=X'

# Retrieve the historical data from March 13th, 2020 to live using yfinance
df = yf.download(ticker, start='2020-03-13')

# Save the historical data to a CSV file
df.to_csv('usdcad_prices.csv')
