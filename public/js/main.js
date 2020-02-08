let rows = document.getElementsByTagName('tr');
for (let row of rows) {
    let key = row.id;
    let radioButtons = document.getElementsByName(key);
    radioButtons.forEach((item) => {
        item.addEventListener('click', (item) => {
            $inputResult = document.getElementById(key).lastChild.lastChild;
    let method = item.target.value;
            let url = '/data?' +'key=' + key +'&method=' + method;
            async function getData() {
                let response = await fetch(url);
                let json = await response.json();
                $inputResult.value = json;
            }
            getData();
        })
    });
}
