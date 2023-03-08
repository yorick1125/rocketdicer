import requests
import json

# set the API endpoint URL and parameters
url = 'http://api.worldbank.org/v2/country'
params = {
    'format': 'json',
    'per_page': '500',
    'date': '1960:2021',
    'indicator': 'NY.GDP.MKTP.KD.ZG'
}

# set the country codes for the US and Canada
us_code = 'USA'
ca_code = 'CAN'

# make the API request for the US data
us_params = {**params, 'country': us_code}
us_response = requests.get(url, params=us_params)

# make the API request for the Canada data
ca_params = {**params, 'country': ca_code}
ca_response = requests.get(url, params=ca_params)

# extract the GDP growth data from the API response
us_data = json.loads(us_response.text)[1][0]['indicator']['value']
ca_data = json.loads(ca_response.text)[1][0]['indicator']['value']

# print the GDP growth data for the US and Canada
print(f"GDP growth for the US: {us_data}")
print(f"GDP growth for Canada: {ca_data}")
