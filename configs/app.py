from flask import Flask, jsonify
import conf

app = Flask(__name__)

# Загрузка конфигурации при старте приложения
config = conf.read_config()

@app.route('/get-config', methods=['GET'])
def get_config():
    if not config:
        return jsonify({"error": "Конфигурация не загружена"}), 500
    return jsonify(config)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
