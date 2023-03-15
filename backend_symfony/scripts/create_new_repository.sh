REPOSITORY_PATH=$1
REPOSITORY_NAME=$2
USERNAME=$3
REPOSITORY_FILES=$4

# Création du dossier utilisateur si n'existe pas
if [ ! -d "/home/${USERNAME}" ]; then
  sudo useradd -m "${USERNAME}"
  echo "L'utilisateur ${USERNAME} a été créé."
fi

# Création du dossier du repository
mkdir "${REPOSITORY_PATH}/${REPOSITORY_NAME}"

for file in $(echo REPOSITORY_FILES | jq -r '.files[] | @base64'); do
    filename=$(echo "$file" | base64 --decode | jq -r '.name')
    filedata=$(echo "$file" | base64 --decode | jq -r '.data')
    echo "$filedata" | base64 --decode > "${REPOSITORY_PATH}/${REPOSITORY_NAME}/${filename}"
done
