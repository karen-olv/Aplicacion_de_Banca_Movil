@extends('layouts.app')

@section('title', 'Pagos QR - Bankario')

@section('content')
    <div class="min-h-screen bg-background">
        <!-- Header -->
        <header class="border-b-2 border-border bg-card">
            <div class="max-w-7xl mx-auto px-6 py-6 flex items-center justify-between">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-muted-foreground hover:text-foreground transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="text-sm uppercase tracking-wide">Volver</span>
                </a>
                <h1 class="text-2xl font-bold text-foreground">Pagos QR</h1>
                <div class="w-24"></div>
            </div>
        </header>

        <main class="max-w-3xl mx-auto px-6 py-12">
            <h2 class="text-5xl font-bold text-foreground mb-12">Pagos con QR</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Escanear QR -->
                <div class="bg-card border-2 border-border rounded-lg p-8">
                    <h3 class="text-2xl font-bold text-foreground mb-6">Escanear QR</h3>
                    <div class="aspect-square bg-secondary rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-24 h-24 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                    </div>
                    <button class="w-full h-14 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg">
                        Abrir Cámara
                    </button>
                </div>

                <!-- Generar QR -->
                <div class="bg-card border-2 border-border rounded-lg p-8">
                    <h3 class="text-2xl font-bold text-foreground mb-6">Generar QR</h3>

                    <form method="POST" action="{{ route('qr-payments.generate') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-3">
                            <label for="amount" class="block text-sm font-medium text-foreground uppercase tracking-wide">
                                Monto
                            </label>
                            <input
                                id="amount"
                                name="amount"
                                type="number"
                                step="0.01"
                                placeholder="0.00"
                                class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                                required
                            />
                        </div>

                        <div class="space-y-3">
                            <label for="description" class="block text-sm font-medium text-foreground uppercase tracking-wide">
                                Descripción
                            </label>
                            <input
                                id="description"
                                name="description"
                                type="text"
                                placeholder="Concepto del pago"
                                class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                            />
                        </div>

                        <button
                            type="submit"
                            class="w-full h-14 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg"
                        >
                            Generar Código QR
                        </button>
                    </form>

                    @if(session('qrCode'))
                        <div class="mt-6 p-6 bg-secondary rounded-lg">
                            <img src="{{ session('qrCode') }}" alt="Código QR" class="w-full" />
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>
@endsection
