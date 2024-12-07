import requests

def test_get_config():
    response = requests.get('http://localhost:5000/get-config')
    if response.status_code == 200:
        print("Тест пройден. Конфигурация получена успешно.")
    else:
        print("Ошибка при тестировании API:", response.status_code)

if __name__ == '__main__':
    test_get_config()
