@extends('layouts.app')
@section('title', 'Agregar Producto Nuevo')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')

<div class="container">
    <div class="form-container">
        <div class="product-advice">
            <p>Ingrese el nombre y las propiedades del producto</p>
        </div>
        <!-- Formulario para ingresar detalles del producto -->
        <form id="product-form" action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div>
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion">
            </div>

            <div>
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>
            </div>

            <div>
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" required>
            </div>

            <div>
                <label for="categoria"> Categoria:</label>
                <select id="categoria" name="categoria_id">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="button-container">
                <button type="submit" class="submit-button">Agregar Producto</button>
                <button type="button" class="clear-button" onclick="clearForm()">Deshacer</button>
            </div>
        </form>
    </div>
    <div class="product-preview">
        <!-- Vista previa del producto con detalles y características -->
        <div class="contenedor__detalles">
            <!-- Información del Producto -->
            <h2 class="titulo_producto" id="product-name"></h2>
            <h1 class="precio_producto" id="product-price"></h1>
            <p class="stock_producto"><b>Stock disponible:</b> <span id="product-stock"></span></p>
        </div>

        <x-section-border />
        <!-- Características del Producto -->
        <div class="contenedor__caracteristicas">
            <h3 class="caracteristicas__titulo">Características principales</h3>
            <ul class="caracteristicas__lista">
                <li class="caracteristica__item"><span>Categoría:</span> <span id="product-category"></span></li>
            </ul>
        </div>
        <x-section-border />

        <!-- Descripción del Producto -->
        <div class="contenedor__descripcion">
            <h3 class="descripcion__titulo">Descripción</h3>
            <div class="descripcion__detalles">
                <p id="product-description"></p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    // Actualiza la vista previa del producto a medida que se ingresan los datos en el formulario
    document.getElementById('product-form').addEventListener('input', function (event) {
        // Obtiene los valores ingresados en el formulario
        const name = document.getElementById('nombre').value;
        const description = document.getElementById('descripcion').value;
        const price = document.getElementById('precio').value;
        const category = document.getElementById('categoria').options[document.getElementById('categoria').selectedIndex].text;
        const stock = document.getElementById('stock').value;

        // Actualiza los elementos de la vista previa con los valores del formulario
        document.getElementById('product-name').textContent = name;
        document.getElementById('product-price').textContent = `$${parseFloat(price).toFixed(2)}`;
        document.getElementById('product-category').textContent = category;
        document.getElementById('product-stock').textContent = stock;
        document.getElementById('product-description').textContent = description;
    });

    // Función para limpiar el formulario y la vista previa del producto
    function clearForm() {
        // Resetea el formulario
        document.getElementById('product-form').reset();
        // Limpia el contenido de la vista previa
        document.getElementById('product-name').textContent = '';
        document.getElementById('product-price').textContent = '';
        document.getElementById('product-category').textContent = '';
        document.getElementById('product-stock').textContent = '';
        document.getElementById('product-description').textContent = '';
    }
</script>
@endsection