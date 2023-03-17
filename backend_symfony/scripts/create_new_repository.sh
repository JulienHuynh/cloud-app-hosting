REPOSITORY_PATH="/home/lsamuel/repositories"
REPOSITORY_NAME="index-app"
USERNAME="alexis"
REPOSITORY_FILES='
[
  {
    "name": "test.html",
    "data": "PGgxPkhlbGxvLCBXb3JsZCE8L2gxPg=="
  },
  {
    "name": "script.js",
    "data": "dmFyIHN0cmluZyA9IHN0cmluZyArICh2YXIgbmFtZSA9ICJIZWxsbyI7IHN0cmluZy5yZXBsYWNlKCJoZWxsb1wiKSAqICR7bmFtZX0pOw=="
  }
]'

# Création du dossier utilisateur si n'existe pas
if [ ! -d "/home/${USERNAME}" ]; then
  sudo useradd -m "${USERNAME}"
  echo "L'utilisateur ${USERNAME} a été créé."
fi

# Création du dossier du repository
mkdir "${REPOSITORY_PATH}/${REPOSITORY_NAME}"

# Décoder et enregistrer les fichiers encodés en base64 à partir de la variable JSON
for file in $(echo "$REPOSITORY_FILES" | jq -r '.[] | @base64'); do
    filename=$(echo "$file" | base64 --decode | jq -r '.name')
    filedata=$(echo "$file" | base64 --decode | jq -r '.data')
    echo "$filedata" | base64 --decode > "${REPOSITORY_PATH}/${REPOSITORY_NAME}/${filename}"
done
