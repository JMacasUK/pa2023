import requests

# Esta es la dirección del API creado en PHP, es específica de nuestra configuración local
url = 'http://localhost/www/php_api/api.php?x=50&y=33'

response = requests.get(url)

print(response)
print(response.text)
print(response.json())
print(response.json()['data'])