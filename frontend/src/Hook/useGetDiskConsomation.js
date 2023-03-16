export default function useGetDiskConsomation() {
    return function () {
        return fetch('http://localhost:1234/bdd-size', {
            method: 'GET',
            mode: "cors"
        })
            .then(data => data.json())
    }
}