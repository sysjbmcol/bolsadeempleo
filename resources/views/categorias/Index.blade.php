
    @extends('layouts.app')

    @section('content')
   
            <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <h1 class="text-white text-center">¿Qué servicios estas buscando?</h1>
                            <h6 class="text-center">....</h6>
                            <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bi-search" id="basic-addon1">
                                
                                    </span>
                                    <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Tecnología, Belleza, Contruccións, Mecanica ..." aria-label="Search">
                                    <button type="submit" class="form-control">Search</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

            <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center " id="containerCategorias">
       
                    </div>
                </div>
            </section>
    @endsection

    @section('script')
    <script>
            async function getCategorias(url) {
                const res = await fetch(url);
                response = await res.json();
                // Variable para almacenar el HTML generado
                var html = '';

                // Recorrer el arreglo de datos y construir el HTML dinámicamente
                response.forEach(function(item) {
                    // Utilizar una plantilla de cadena para construir el HTML
                    html += `
                        <div class="col-xl-4 col-md-6 col-sm-6 mt-5 center">
                            <div class="article-card">
                                <div class="content">
                                    <p class="title">${item.nombre}</p>
                                </div>
                                <img src="${item.imagen}" alt="article-cover" />
                            </div>
                        </div>
                    `;
                });

                // Obtener el contenedor donde deseas agregar el HTML
                var container = document.getElementById("containerCategorias");

                // Agregar el HTML generado al contenedor
                container.innerHTML = html;
            }
            getCategorias('/api/v1/categorias/@');
           
        </script>
    @endsection

