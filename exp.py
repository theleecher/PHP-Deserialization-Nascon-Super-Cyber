import requests
import urllib
import base64

proxies = { "http": "http://192.168.1.43:8080", "https":"https://192.168.1.43:8080" }

url = "http://192.168.1.2:9999/checksec.php"

session = requests.Session()

r = session.post(url, data={"name":"omda","organization":"ntra","employee-size":"10-100","pentesting-frequency":"twice-year"},proxies=proxies)

r2 = session.get("http://192.168.1.2:9999/checksecResults.php",proxies=proxies,verify=False)
print(session.cookies['session'])
print(base64.b64decode(urllib.parse.unquote(session.cookies['session'])))