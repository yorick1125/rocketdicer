const API_KEY = "SIPxlSNq6uddlJkN1Es47g==g8kZb3UrfqhB0ht4";

async function fetchData() {
  return {
    canada: {
      int_rate: await fetchIntRate("canada"),
      inflation: await fetchInflation("canada"),
      unemployment: await fetchUnemployment("canada"),
      gdp_growth: await fetchGdpGrowth("canada")
    },
    us: {
      int_rate: await fetchIntRate("united states"),
      inflation: await fetchInflation("united states"),
      unemployment: await fetchUnemployment("united states"),
      gdp_growth: await fetchGdpGrowth("united states")
    }
  };
}

async function fetchIntRate(country) {
  const response = await fetch(
    "https://api.api-ninjas.com/v1/interestrate?country=" + country,
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-Api-Key": API_KEY
      }
    }
  );
  const json = await response.json();

  return json.central_bank_rates[0].rate_pct;
}

async function fetchInflation(country) {
  const response = await fetch(
    "https://api.api-ninjas.com/v1/inflation?country=" + country,
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-Api-Key": API_KEY
      }
    }
  );
  const json = await response.json();

  return json[0].yearly_rate_pct;
}

async function fetchUnemployment(country) {
  const response = await fetch(
    "https://api.api-ninjas.com/v1/country?name=" + country,
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-Api-Key": API_KEY
      }
    }
  );
  const json = await response.json();

  return json[0].unemployment;
}

async function fetchGdpGrowth(country) {
  const response = await fetch(
    "https://api.api-ninjas.com/v1/country?name=" + country,
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-Api-Key": API_KEY
      }
    }
  );
  const json = await response.json();

  return json[0].gdp_growth;
}


/* TO COMPLETE */

async function fetchRetailSentiment(country) {
  // 1. find a website with retail sentiment data for either usd or canada depending on country code sent in

  // 2. find a way to webscrape the data

  // 3. only things we need are two doubles that represent the percentage like 60% us, 40% canada or something like that
}

fetchData().then((val) => console.log(val));
