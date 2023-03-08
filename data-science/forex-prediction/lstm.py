import pandas as pd
import numpy as np
from sklearn.preprocessing import MinMaxScaler
from keras.models import Sequential
from keras.layers import Dense, LSTM

# Load data from CSV file
data = pd.read_csv('usdcad_prices.csv')

# Extract only the Close prices
close_data = data[['Close']]

# Normalize the data using MinMaxScaler
scaler = MinMaxScaler(feature_range=(0,1))
scaled_data = scaler.fit_transform(close_data)

# Split the data into training and testing sets
training_data = scaled_data[:len(close_data)-5, :]
testing_data = scaled_data[len(close_data)-5:, :]

# Define the function to create the LSTM model
def create_lstm_model(input_data):
    model = Sequential()
    model.add(LSTM(50, return_sequences=True, input_shape=(input_data.shape[1], 1)))
    model.add(LSTM(50, return_sequences=False))
    model.add(Dense(25))
    model.add(Dense(1))
    return model

# Create the LSTM model and train it on the training data
lstm_model = create_lstm_model(training_data)
lstm_model.compile(optimizer='adam', loss='mean_squared_error')
lstm_model.fit(training_data, epochs=10, batch_size=1)

# Use the LSTM model to make predictions on the testing data
x_test = testing_data[:-1]
x_test = np.reshape(x_test, (1, x_test.shape[0], 1))
predicted_price = lstm_model.predict(x_test)
predicted_price = scaler.inverse_transform(predicted_price)

# Print the current price and the predicted price five days later
current_price = close_data.iloc[-1]['Close']
print('Current USDCAD price:', current_price)
print('USDCAD price in 5 days:', predicted_price[0][0])
