REPOSITORY_PATH=$1
REPOSITORY_NAME=$2
USERNAME=$3

# Création du dossier utilisateur si n'existe pas
if [ ! -d "/home/${USERNAME}" ]; then
  sudo useradd -m "${USERNAME}"
  echo "L'utilisateur ${USERNAME} a été créé."
fi

# Création du dossier du repository
mkdir "${REPOSITORY_PATH}/${REPOSITORY_NAME}"
