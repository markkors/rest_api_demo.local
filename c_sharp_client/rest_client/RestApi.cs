using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace rest_client
{
    internal class RestApi
    {
        public static async Task<List<Record>> GetDataFromApiAsync()
        {
            string apiUrl = "http://rest_api_demo.local/get"; // Replace with your API endpoint

            using (HttpClient client = new HttpClient())
            {
                try
                {
                    HttpResponseMessage response = await client.GetAsync(apiUrl);

                    if (response.IsSuccessStatusCode)
                    {
                        string jsonContent = await response.Content.ReadAsStringAsync();
                        Console.WriteLine($"Data retrieved from API: {jsonContent}");

                        Data data = JsonConvert.DeserializeObject<Data>(jsonContent);
                        List<Record> records = data.data;
                        //List<Record> data = JsonConvert.DeserializeObject<List<Record>>(jsonContent);
                        //return data;
                        return records;

                    }
                    else
                    {
                        Console.WriteLine($"Failed to fetch data. Status code: {response.StatusCode}");
                    }
                }
                catch (Exception ex)
                {
                    Console.WriteLine($"Error: {ex.Message}");
                }

                return null;
            }
        }

    }
}
