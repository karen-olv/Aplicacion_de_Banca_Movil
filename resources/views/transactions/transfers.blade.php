@extends('layouts.app')

@section('title', 'Transferencias - Bankario')

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
                <h1 class="text-2xl font-bold text-foreground">Transferencias</h1>
                <div class="w-24"></div>
            </div>
        </header>

        <main class="max-w-3xl mx-auto px-6 py-12">
            <h2 class="text-5xl font-bold text-foreground mb-12">Nueva Transferencia</h2>

            @if(session('success'))
                <div class="mb-8 p-6 bg-green-50 border-2 border-green-200 rounded-lg">
                    <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Formulario de transferencia -->
            <form method="POST" action="{{ route('transfers.store') }}" class="space-y-8 mb-16">
                @csrf

                <div class="space-y-3">
                    <label for="account" class="block text-sm font-medium text-foreground uppercase tracking-wide">
                        Cuenta Destino
                    </label>
                    <input
                        id="account"
                        name="account"
                        type="text"
                        placeholder="Número de cuenta o CLABE"
                        class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                        required
                    />
                </div>

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
                        Descripción (Opcional)
                    </label>
                    <input
                        id="description"
                        name="description"
                        type="text"
                        placeholder="Concepto de la transferencia"
                        class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                    />
                </div>

                <button
                    type="submit"
                    class="w-full h-14 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg"
                >
                    Realizar Transferencia
                </button>
            </form>

            <!-- Contactos recientes -->
            <div>
                <h3 class="text-2xl font-bold text-foreground mb-6">Contactos Recientes</h3>

                <div class="space-y-2">
                    @foreach($recentContacts as $contact)
                        <button
                            type="button"
                            onclick="fillAccount('{{ $contact['account'] }}')"
                            class="w-full p-6 bg-card border-2 border-border hover:border-foreground transition-all rounded-lg text-left"
                        >
                            <p class="text-base font-semibold text-foreground">{{ $contact['name'] }}</p>
                            <p class="text-sm text-muted-foreground mt-1">{{ $contact['account'] }}</p>
                        </button>
                    @endforeach
                </div>
            </div>
        </main>
    </div>

    <script>
        function fillAccount(account) {
            document.getElementById('account').value = account;
        }
    </script>
@endsection
