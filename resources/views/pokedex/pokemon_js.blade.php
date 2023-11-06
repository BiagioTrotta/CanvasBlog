<x-main>
<x-slot:title>{{ $title }}</x-slot:title>
<div class="container">
    <div id="pokemonCards" class="row">
    <!-- Le carte verranno generate qui -->
    </div>
</div>



    <script>
    fetch('/json/pokedex.json')
        .then(response => response.json())
        .then(data => {
            // Genera HTML basato sui dati del pokedex
            var pokemonCardsHtml = '';
            data.pokemon.forEach(pokemon => {
                pokemonCardsHtml += `
                    <div class="col-4">
                        <div class="card mt-5 mb-2 bg-light" style="height: 95%;">
                            <span class="badge text-bg-dark w-25">ID: ${pokemon.id}</span>
                            <img src="${pokemon.img}" class="card-img-top" alt="${pokemon.name}">
                            <div class="card-body bg-white border-top border-4">
                                <p class="card-text bg-dark text-light ps-2">Numero: ${pokemon.num}</p>
                                <p class="card-text bg-light ps-2">Nome: ${pokemon.name}</p>
                                <p class="card-text bg-dark text-light ps-2">Tipi: ${pokemon.type.join(', ')}</p>
                            </div>
                        </div>
                    </div>
                `;
            });

            // Aggiungi l'HTML generato alle carte
            document.getElementById('pokemonCards').innerHTML = pokemonCardsHtml;
        })
        .catch(error => {
            console.error('Errore nel caricamento dei dati JSON:', error);
        });
</script>


</x-main>