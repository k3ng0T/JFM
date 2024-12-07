import boto3
import json

# Конфигурация доступа
s3 = boto3.client(
    's3',
    aws_access_key_id='oDDw1mppRNADixPxYwW9H3',
    aws_secret_access_key='cH9Ro5zK7yD7PMRasf9WoNKGpGWmdQEXDxiNu6VPKNcc',
    endpoint_url='https://hb.kz-ast.bizmrg.com'
)

bucket_name = 'configjfm'
file_key = 'config.bin'
local_file_path = 'configs/config.bin'

def download_config():
    try:
        s3.download_file(bucket_name, file_key, local_file_path)
        print(f"Файл {file_key} успешно загружен в {local_file_path}")
    except Exception as e:
        print(f"Ошибка загрузки: {e}")

def read_config():
    try:
        with open(local_file_path, 'rb') as f:
            config_data = f.read()
            config_str = config_data.decode('utf-8')
            config = json.loads(config_str)
            print("Конфигурация загружена:", config)
            return config
    except Exception as e:
        print(f"Ошибка при чтении конфигурации: {e}")
        return None

if __name__ == '__main__':
    download_config()
    config = read_config()
