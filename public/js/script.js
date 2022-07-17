const ul = document.querySelector('ul')

function getApiGitHub() {
  fetch('https://api.github.com/users/paulodonascimentojr/repos')
    .then(async res => {

      if(!res.ok) {
        throw new Error(res.status)
      }

      var data = await res.json()

      data.map(item => {
        let li = document.createElement('li')

        li.innerHTML = `<br>
        <strong>${item.name.toUpperCase()}</strong><br>
        <span>URL: ${item.html_url} </span><br>
        <span>Data Criação: 
          ${Intl.DateTimeFormat('pt-BR')
            .format(new Date(item.created_at))}
        </span>
      `
      ul.appendChild(li)

      })

    }).catch(e => console.log(e))
}

getApiGitHub()