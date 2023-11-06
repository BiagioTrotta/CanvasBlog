<x-main>
    <div class="container">
        <div class="row">
            @foreach($pokedex as $key => $pokemon)
            <div class="col-4">
                <div class="card mt-5 mb-2 bg-light" style="height: 95%;">
                    <span class="badge text-bg-dark w-25">ID: {{ $pokemon['id'] }}</span>
                    <img src="{{ $pokemon['img'] }}" class="card-img-top" alt="{{ $pokemon['name'] }}">
                    <div class="card-body bg-white border-top border-4">
                        <p class="card-text bg-dark text-light ps-2">Numero: {{ $pokemon['num'] }}</p>
                        <p class="card-text bg-light ps-2">Nome: {{ $pokemon['name'] }}</p>
                        @if(isset($pokemon['type']))
                        <p class="card-text bg-dark text-light ps-2">Tipi: {{ implode(', ', $pokemon['type']) }}</p>
                        @else
                        <p class="card-text bg-dark ps-2">Nessun tipo specificato</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

   <!--  <div id="pokemonList">
    </div> -->

    <!-- <script>
        fetch('/json/pokedex.json')
            .then(response => response.json())
            .then(data => {
                // Genera HTML basato sui dati del pokedex
                var pokemonListHtml = '';
                data.pokemon.forEach(pokemon => {
                    pokemonListHtml += `<div>${pokemon.name} - ${pokemon.type.join(', ')}</div>`;
                });

                // Aggiungi l'HTML generato alla tua pagina
                document.getElementById('pokemonList').innerHTML = pokemonListHtml;
            })
            .catch(error => {
                console.error('Errore nel caricamento dei dati JSON:', error);
            });
    </script> -->
</x-main>