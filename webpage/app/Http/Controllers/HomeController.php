<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getNews() {
        // Set the Yahoo Finance API URL for top news headlines
        $url = "https://finance.yahoo.com/news/top-stories/";
      
        // Initialize cURL and set options for the request
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299",
          ),
        ));
      
        // Execute the cURL request and retrieve the response
        $response = curl_exec($curl);
      
        // Close the cURL session
        curl_close($curl);
      
        // Parse the HTML response and extract the news headlines
        $doc = new DOMDocument();
        @$doc->loadHTML($response);
        $xpath = new DOMXPath($doc);
        $titles = $xpath->query('//h3[@class="Mb(5px)"]');
        $links = $xpath->query('//a[@class="Fz(18px) Fw(b) Fz(23px)--sm1024 Lh(23px) Lh(29px)--sm1024 LineClamp(2,46px)"]/@href');
      
        // Store the news headlines in an array
        $news = array();
        for ($i = 0; $i < $titles->length; $i++) {
          $title = $titles->item($i)->textContent;
          $link = "https://finance.yahoo.com" . $links->item($i)->nodeValue;
          $news[] = array("title" => $title, "link" => $link);
        }
      
        // Return the news headlines as a data variable
        return $news;
    }

    function getEconomicData() {
        // Load the Bank of Canada website using Simple HTML DOM Parser
        include_once('simple_html_dom.php');
        $html = file_get_html('https://www.bankofcanada.ca/rates/indicators/key-variables/');
        
        // Find the latest interest rate
        $interest_rate = $html->find('#interest-rates .mainbar table tr', 1)->find('td', 1)->plaintext;
        
        // Find the latest inflation data
        $inflation_data = array();
        $table_rows = $html->find('#inflation .mainbar table tr');
        foreach($table_rows as $row) {
            $year = $row->find('td', 0)->plaintext;
            $inflation_rate = $row->find('td', 1)->plaintext;
            $inflation_data[$year] = $inflation_rate;
        }
        $latest_inflation = end($inflation_data);
        
        // Find the latest unemployment rate
        $unemployment_rate = $html->find('#unemployment .mainbar table tr', 1)->find('td', 1)->plaintext;
        
        // Find the latest GDP growth rate
        $gdp_growth_data = array();
        $table_rows = $html->find('#gdp .mainbar table tr');
        foreach($table_rows as $row) {
            $quarter = $row->find('td', 0)->plaintext;
            $gdp_growth_rate = $row->find('td', 1)->plaintext;
            $gdp_growth_data[$quarter] = $gdp_growth_rate;
        }
        $latest_gdp_growth = end($gdp_growth_data);
        
        // Return the data as an array
        return array(
            'interest_rate' => $interest_rate,
            'inflation_rate' => $latest_inflation,
            'unemployment_rate' => $unemployment_rate,
            'gdp_growth_rate' => $latest_gdp_growth
        );
    }
     
    
      

}
