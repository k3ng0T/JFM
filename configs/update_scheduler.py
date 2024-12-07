import schedule
import time
import conf

def update_config():
    print("Обновление конфигурации...")
    conf.download_config()
    conf.read_config()

schedule.every(1).minute.do(update_config)  # Обновление каждую минуту

while True:
    schedule.run_pending()
    time.sleep(1)
