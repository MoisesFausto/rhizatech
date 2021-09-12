const buttonBuscar = document.querySelector("#buscar");

buttonBuscar.addEventListener('click', () => {
  console.log('teste');
  let dataInicial = document.getElementById("periodoInicial");
  let dataFinal = document.getElementById("periodoFinal");

  let valueDataInicial = dataInicial.options[dataInicial.selectedIndex].value;
  let valueDataFinal = dataFinal.options[dataFinal.selectedIndex].value;

  const data = JSON.stringify({valueDataInicial, valueDataFinal});

  settings = {
    method: "POST",
    body: data,
    headers: {
      "Content-Type": "application/json",
      "Accept":       "application/json"
    },
  }

  fetch('../../src/App/Mvc/Controller.php', settings)
  .then( response => response.text() )
  .then( result => console.log(result) )
  .catch( error => console.log('error', error) )

});
