@extends('layouts.app')

@section('title', 'Préstamos - Bankario')

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
                <h1 class="text-2xl font-bold text-foreground">Préstamos</h1>
                <div class="w-24"></div>
            </div>
        </header>

        <main class="max-w-5xl mx-auto px-6 py-12">
            <h2 class="text-5xl font-bold text-foreground mb-12">Préstamos</h2>

            <div class="grid lg:grid-cols-2 gap-8 mb-16">
                <!-- Calculadora de préstamos -->
                <div class="bg-card border-2 border-border rounded-lg p-8">
                    <h3 class="text-2xl font-bold text-foreground mb-6">Calcular Préstamo</h3>

                    <form method="POST" action="{{ route('loans.calculate') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-3">
                            <label for="amount" class="block text-sm font-medium text-foreground uppercase tracking-wide">
                                Monto Solicitado
                            </label>
                            <input
                                id="amount"
                                name="amount"
                                type="number"
                                step="1000"
                                placeholder="50000"
                                class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                                required
                            />
                        </div>

                        <div class="space-y-3">
                            <label for="months" class="block text-sm font-medium text-foreground uppercase tracking-wide">
                                Plazo (meses)
                            </label>
                            <input
                                id="months"
                                name="months"
                                type="number"
                                min="6"
                                max="60"
                                placeholder="12"
                                class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                                required
                            />
                        </div>

                        <button
                            type="submit"
                            class="w-full h-14 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg"
                        >
                            Calcular
                        </button>
                    </form>

                    @if(session('calculation'))
                        <div class="mt-8 p-6 bg-secondary rounded-lg space-y-3">
                            <div class="flex justify-between">
                                <span class="text-muted-foreground">Pago mensual:</span>
                                <span class="font-bold text-foreground">${{ number_format(session('calculation')['monthlyPayment'], 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-muted-foreground">Total a pagar:</span>
                                <span class="font-bold text-foreground">${{ number_format(session('calculation')['total'], 2) }}</span>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Préstamos activos -->
                <div class="bg-card border-2 border-border rounded-lg p-8">
                    <h3 class="text-2xl font-bold text-foreground mb-6">Préstamos Activos</h3>

                    @if(count($activeLoans) > 0)
                        <div class="space-y-6">
                            @foreach($activeLoans as $loan)
                                <div class="p-6 bg-secondary rounded-lg">
                                    <p class="text-sm uppercase tracking-wide text-muted-foreground mb-2">{{ $loan['type'] }}</p>
                                    <p class="text-2xl font-bold text-foreground mb-4">${{ number_format($loan['amount'], 2) }}</p>

                                    <div class="space-y-2 text-sm">
                                        <div class="flex justify-between">
                                            <span class="text-muted-foreground">Restante:</span>
                                            <span class="font-semibold text-foreground">${{ number_format($loan['remaining'], 2) }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-muted-foreground">Tasa:</span>
                                            <span class="font-semibold text-foreground">{{ $loan['rate'] }}%</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-muted-foreground">Próximo pago:</span>
                                            <span class="font-semibold text-foreground">{{ $loan['nextPayment'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted-foreground">No tienes préstamos activos.</p>
                    @endif
                </div>
            </div>

            <!-- Solicitar nuevo préstamo -->
            <div class="bg-card border-2 border-border rounded-lg p-8">
                <h3 class="text-2xl font-bold text-foreground mb-4">Solicitar Nuevo Préstamo</h3>
                <p class="text-muted-foreground mb-6">Completa tu solicitud y recibe una respuesta en minutos.</p>
                <button class="h-14 px-8 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg">
                    Iniciar Solicitud
                </button>
            </div>
        </main>
    </div>
@endsection
