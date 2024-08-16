@extends('layouts.app')
@section('title', 'Pago')
@section('nav')
    @include('navigation-menu')
@endsection
@section('content')
    <h1 class="h1">Selecciona un Método de Pago</h1>

    <form action="{{ route('procesarPago.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <section class="product-list">
            <h2>Método de Pago</h2>
            <div class="product-item" id="ripsaSection">
                <img src="{{ asset('resource/ripsa.png') }}" alt="Ripsa">
                <div class="product-info">
                    <h3>Ripsa</h3>
                    <p>Paga de manera rápida y segura con Ripsa.</p>
                </div>
                <button class="btn btn-primary" type="button" name="Metodo" value="Ripsa" onclick="showRipsaSurvey()">Más Información</button>
            </div>
            <div class="product-item" id="mercadoPagoSection">
                <img src="{{ asset('resource/mercado_pago.png') }}" alt="Mercado Pago">
                <div class="product-info">
                    <h3>Mercado Pago</h3>
                    <p>Paga de manera rápida y segura con Mercado Pago.</p>
                </div>
                <button class="btn btn-primary" type="button" name="Metodo" value="Mercado Pago" onclick="showMercadoPago()">Más Información</button>
            </div>
        </section>

        <section class="form-container" id="formContainer" style="display: none;">
            <button type="button" onclick="generatePaymentCode()">Generar Código de Pago</button>
            <div class="payment-code" id="paymentCode" style="display: none;">
                <h3>Código de Pago:</h3>
                <p id="paymentCodeValue"></p>

                <section class="qr-container" id="qrContainer" style="display: none;">
                    <h2>Código QR para Mercado Pago</h2>
                    <div id="qrCode"></div>
                </section>

                <div class="col-span-6 sm:col-span-4 flex items-center">
                    <label for="archivo">Subir Comprobante:</label>
                    <input type="file" name="archivo" id="archivo">
                    @error('archivo')
                        <p>{{ $message }}</p>
                    @enderror
                *no funciona
                <!-- Save Button -->
                <button type="submit">Enviar Comprobante</button>
            </div>
        </section>
    </form>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>
<script>
    function showRipsaSurvey() {
        // Show Ripsa section and form
        document.getElementById('ripsaSection').style.display = 'block';
        document.getElementById('mercadoPagoSection').style.display = 'none';
        document.getElementById('formContainer').style.display = 'block';
        document.getElementById('qrContainer').style.display = 'none';
    }

    function showMercadoPago() {
        // Show Mercado Pago section and QR code
        document.getElementById('mercadoPagoSection').style.display = 'block';
        document.getElementById('ripsaSection').style.display = 'none';
        document.getElementById('formContainer').style.display = 'none';
        document.getElementById('qrContainer').style.display = 'block';

        // Generate a QR code for Mercado Pago
        QRCode.toCanvas(document.getElementById('qrCode'), 'https://www.mercadopago.com.ar', function (error) {
            if (error) console.error(error);
        });
    }

    function generatePaymentCode() {
        // Generate a payment code
        var code = 'RIPSA-' + Math.random().toString(36).substr(2, 9).toUpperCase();

        // Display the payment code
        document.getElementById('paymentCodeValue').innerText = code;
        document.getElementById('paymentCode').style.display = 'block';
    }
</script>
@endsection
