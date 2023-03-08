import MetaTrader5 as mt5
import pandas as pd

# connect to MetaTrader 5
if not mt5.initialize():
    print("Failed to connect to MetaTrader 5")
    quit()
    

# set the symbol and timeframe
symbol = "USDCAD"
timeframe = mt5.TIMEFRAME_H1

# request historical data
bars = mt5.copy_rates_from_pos(symbol, timeframe, 0, 1000)
df = pd.DataFrame(bars)
df['time'] = pd.to_datetime(df['time'], unit='s')
df.set_index('time', inplace=True)

# calculate the moving averages
ma_fast = df['close'].rolling(window=50).mean()
ma_slow = df['close'].rolling(window=200).mean()

# calculate the difference between the two moving averages
divergence = ma_fast - ma_slow

# generate buy/sell signals
signals = []
for i in range(1, len(df)):
    if divergence.iloc[i] > 0 and divergence.iloc[i-1] <= 0:
        signals.append(1)  # buy signal
    elif divergence.iloc[i] < 0 and divergence.iloc[i-1] >= 0:
        signals.append(-1)  # sell signal
    else:
        signals.append(0)  # no signal

# place trades based on the signals
for i in range(len(signals)):
    if signals[i] == 1:
        mt5.symbol_select(symbol)
        mt5.order_send(symbol, mt5.ORDER_TYPE_BUY, 0.1, mt5.symbol_info_tick(symbol).ask, slippage=10)
    elif signals[i] == -1:
        mt5.symbol_select(symbol)
        mt5.order_send(symbol, mt5.ORDER_TYPE_SELL, 0.1, mt5.symbol_info_tick(symbol).bid, slippage=10)

# disconnect from MetaTrader 5
mt5.shutdown()
