using System;
using System.Net.Http;
using System.Threading.Tasks;
using Newtonsoft.Json;

class Program
{
    static async Task Main(string[] args)
    {
        // URL de la API que deseas llamar
        string apiUrl = "http://localhost/www/php_api/api.php?x=50&y=33";

        // Crear una instancia de HttpClient (debe ser reutilizada en toda la aplicación)
        using (HttpClient httpClient = new HttpClient())
        {
            try
            {
                // Realizar la solicitud GET a la API
                HttpResponseMessage response = await httpClient.GetAsync(apiUrl);

                // Verificar si la solicitud fue exitosa (código de estado 200)
                if (response.IsSuccessStatusCode)
                {
                    // Leer el contenido de la respuesta como una cadena
                    string responseBody = await response.Content.ReadAsStringAsync();
                    
                     // Deserializar la respuesta JSON en un objeto
                    var responseObject = JsonConvert.DeserializeObject<MyApiResponse>(responseBody);

                    // Acceder al valor de "data" en el objeto
                    string data = responseObject.data;

                    // Puedes trabajar con el valor de "data" aquí
                    Console.WriteLine($"Data: {data}");

                    // Puedes procesar y trabajar con el responseBody aquí
                    Console.WriteLine("Respuesta de la API:");
                    Console.WriteLine(responseBody);
                }
                else
                {
                    Console.WriteLine($"Error en la solicitud. Código de estado: {response.StatusCode}");
                }
            }
            catch (Exception ex)
            {
                Console.WriteLine($"Error en la solicitud: {ex.Message}");
            }
        }
    }

    public class MyApiResponse
    {
        public string data { get; set; }
    }
}
