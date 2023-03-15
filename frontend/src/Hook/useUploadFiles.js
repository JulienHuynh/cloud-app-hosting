export default function useUploadFiles(acceptedFiles, repositoryName) {
    const formData = new FormData();

    acceptedFiles.forEach((file) => {
        formData.append("files[]", file);
    });

    return function () {
        return fetch("http://localhost:1234/new-repository", {
            method: "POST",
            mode: "cors",
            body: new URLSearchParams({
                repositoryName: repositoryName,
                files: formData,
            })
        });
    }
}
