import requests

response = requests.get("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency=USD&to_currency=CAD&apikey=YOUR_API_KEY")
data = response.json()

price = data["Realtime Currency Exchange Rate"]["5. Exchange Rate"]
print(f"USD/CAD: {price}")
