import { useDropzone } from "react-dropzone";
import useUploadFiles from "../../Hook/useUploadFiles";
import {useState} from "react";

function NewRepositoryForm() {
    const [repositoryName, setRepositoryName] = useState("");
    const { acceptedFiles, getRootProps, getInputProps } = useDropzone();
    const uploadFiles = useUploadFiles(acceptedFiles, repositoryName);

    const handleRepositoryName = (event) => {
        setRepositoryName(event.target.value);
        console.log(repositoryName);
    }

    const files = acceptedFiles.map((file) => (
        <li key={file.path}>
            {file.path} - {file.size} bytes
        </li>
    ));

    return (
        <div className="new-repository-form">
            <div>
                <label>Nom du dépôt</label>
                <input name="repository-name" type="text" onChange={handleRepositoryName} value={repositoryName} required/>
            </div>
            <div {...getRootProps({ className: "dropzone" })}>
                <input {...getInputProps()} />
                <p>Glissez-déposez des fichiers ici ou cliquez pour en sélectionner</p>
            </div>
            <aside>
                <h4>Fichiers sélectionnés</h4>
                <ul>{files}</ul>
                <button onClick={uploadFiles}>Envoyer</button>
            </aside>
        </div>
    );
}

export default NewRepositoryForm;
