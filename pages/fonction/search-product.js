if (document.getElementById('form-search')) {         
    const form = document.getElementById('form-search')
    const input = document.querySelector('#form-search input[type="text"]')

    form.addEventListener('submit', (e) => {
        e.preventDefault()
        let valueSubmit = input.value
        let varSend = valueSubmit
        fetchPost(varSend, urlPhpFile)
    })

    input.addEventListener('input', () => {
        let valueInput = input.value
        let varSend = valueInput
        fetchPost(varSend, urlPhpFile)
    })

    urlPhpFile = "include/data-to-catch.php"

    const fetchPost = (varSend, urlPhpFile) => {
        const options = {
            method: 'POST',
            mode: 'same-origin',
            credentials: 'same-origin',
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: JSON.stringify(varSend)
        }

        fetch(urlPhpFile, options)
        .then(response => {
            return response.json()
        })
        .then(data => {
            displayData(data);
        })
        .catch(error => console.log(error))
    }

    const displayData = (data) => {
        const divProduit = document.getElementById('categorie')
        const produit = document.getElementById('produit')
        const displayProduit = document.getElementById('group-product')
        let searchProduit = ""
        if (!data.length == 0) {
            const produitsearch = document.querySelectorAll('#produitsearch')
            let produitArray = Array.from(produitsearch)
            produitArray.forEach(element => {
                element.remove()
            })
            if (displayProduit) {
                displayProduit.style.display = "none"
            } else {
               produit.style.display = "none" 
            }
            for (let item of data) {
                searchProduit = `
                <a id="produitsearch" href="index.php?page=boutique&produit=${item.titre}" style="color:black; display:flex; flex-direction:column; max-width:250px; text-align:center;">
                    <div style="position:relative">
                        <img src="admin/${item.photo}" alt="${item.titre}">`
                if (item.bio == "oui") {
                    searchProduit += `
                    <img src="img/logo-bio-50x50.png" alt="bio" style="position:absolute; top: 10px; right: 10px;">
                    `
                }
                if (item.prix > item.prix_promo) {
                    searchProduit += `
                    <p style="position:absolute; bottom: 15px; left: 15px; color:red; font-size:20px">-${(100-((item.prix_promo*100)/item.prix)).toFixed()} %</p>
                    `
                }
                searchProduit += `
                    </div>
                        <p>${item.titre}</p>
                        <span>$${item.prix}</span>
                    </a>
                `
                divProduit.insertAdjacentHTML('beforeend', searchProduit)
            }
        } else {
            const produitsearch = document.querySelectorAll('#produitsearch')
            let produitArray = Array.from(produitsearch)
            produitArray.forEach(element => {
                element.remove()
            })
            if (displayProduit) {
                displayProduit.style.display = "flex"
            } else {
               produit.style.display = "flex" 
            }
        }
    }
    
    
}