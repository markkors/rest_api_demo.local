using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace rest_client
{
    internal class Program
    {
        
        static void Main(string[] args)
        {
            // Start de taak met Task.Run
            Task mytask = Task.Run(async () => await getData());
            // Voer andere bewerkingen uit terwijl de taak wordt uitgevoerd in de achtergrond
            Console.WriteLine("Main-methode gaat verder met andere bewerkingen.");
            // Wacht op het voltooien van de taak als dat nodig is
            mytask.Wait();

            Console.WriteLine("GetData-taak is voltooid.");
            // Wait for user input to keep the console window open
            Console.WriteLine("Press Enter to exit...");
            Console.ReadLine();
        }

        static async Task getData()
        {
            List<Record> dataList = await RestApi.GetDataFromApiAsync();

            if (dataList != null)
            {
                foreach (var item in dataList)
                {
                    Console.WriteLine($"ID: {item.id}, First: {item.voornaam}, Last: {item.achternaam}, Email: {item.email}, Birth: {item.geboortedatum}");
                }
            }
            else
            {
                Console.WriteLine("Data retrieval failed.");
            }
            
        }

    }
}
