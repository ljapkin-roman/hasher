let rows = document.getElementsByTagName('tr');
for (let row of rows) {
    let key = row.id;
    let radioButtons = document.getElementsByName(key);
    radioButtons.forEach((item) => {
        $inputResalt = document.getElementById(key).lastChild.lastChild;
        item.addEventListener('click', (item) => {
            let method = item.target.value;
            let url = '/data?' +'key=' + key +'&method=' + method;
            async function getData() {
                let response = await fetch(url);
                let json = await response.json();
                $inputResalt.value = json;
            }
            getData();
        })
    });
}
