# IMPORT
from flask import Flask
from flask_cors import CORS
from flask import jsonify
from flask import request
# APP SETUP
app = Flask(__name__)
# enable resource sharing between frontend and server
CORS(app)
songs = [
    {
        "id": 1,
        "title": "Danza kuduro",
        "artist": "Don Omar",
    },
    {
        "id": 2,
        "title": "Despacito",
        "artist": "Luis Fonsi",
    },
    {
        "id": 3,
        "title": "Shape of you",
        "artist": "Ed Sheeran",
    },
    {
        "id": 4,
        "title": "Havana",
        "artist": "Camila Cabello",
    },
    {
        "id": 5,
        "title": "I Ain't Worried",
        "artist": "OneRepublic",
    }
]
# ROUTES
@app.route('/song', methods=['GET'])
def getSong():
    return jsonify(songs)
@app.route('/song', methods=['POST'])
def postSong():
    data = request.get_json()
    id = len(songs) + 1
    data['id'] = id
    songs.append(data)
    return jsonify(songs)
@app.route('/song', methods=['DELETE'])
def deleteSong():
    data = request.get_json()
    id = data['id']
    for song in songs:
        if song['id'] == id:
            songs.remove(song)
    return jsonify(songs)
if __name__ == "__main__":
    app.run(debug=True)