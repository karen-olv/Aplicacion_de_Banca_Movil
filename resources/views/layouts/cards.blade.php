@extends('layouts.app')

@section('title', 'Gestión de Tarjetas - Bankario')

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
                <h1 class="text-2xl font-bold text-foreground">Gestión de Tarjetas</h1>
                <div class="w-24"></div>
            </div>
        </header>

        <main class="max-w-5xl mx-auto px-6 py-12">
            <h2 class="text-5xl font-bold text-foreground mb-12">Mis Tarjetas</h2>

            @if(session('success'))
                <div class="mb-8 p-6 bg-green-50 border-2 border-green-200 rounded-lg">
                    <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-8">
                @foreach($cards as $card)
                    <div class="bg-gradient-to-br from-gray-900 to-gray-700 rounded-2xl p-8 text-white shadow-xl">
                        <!-- Tipo de tarjeta -->
                        <div class="flex items-center justify-between mb-12">
                            <span class="text-sm uppercase tracking-wider opacity-80">{{ $card['type'] }}</span>
                            <svg class="w-12 h-12 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2" stroke-width="2"/>
                                <line x1="1" y1="10" x2="23" y2="10" stroke-width="2"/>
                            </svg>
                        </div>

                        <!-- Número de tarjeta -->
                        <p class="text-2xl font-mono tracking-wider mb-8">{{ $card['number'] }}</p>

                        <!-- Titular y vencimiento -->
                        <div class="flex items-end justify-between">
                            <div>
                                <p class="text-xs uppercase tracking-wider opacity-60 mb-1">Titular</p>
                                <p class="text-sm font-semibold">{{ $card['holder'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs uppercase tracking-wider opacity-60 mb-1">Vence</p>
                                <p class="text-sm font-semibold">{{ $card['expiry'] }}</p>
                            </div>
                        </div>

                        <!-- Acciones -->
                        <div class="mt-8 pt-6 border-t border-white/20 flex gap-4">
                            <form method="POST" action="{{ route('cards.toggle', $card['id']) }}" class="flex-1">
                                @csrf
                                <button
                                    type="submit"
                                    class="w-full py-3 px-4 bg-white/10 hover:bg-white/20 rounded-lg text-sm font-semibold transition-colors"
                                >
                                    {{ $card['status'] === 'active' ? 'Bloquear' : 'Desbloquear' }}
                                </button>
                            </form>
                            <button class="flex-1 py-3 px-4 bg-white/10 hover:bg-white/20 rounded-lg text-sm font-semibold transition-colors">
                                Ver Detalles
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Solicitar nueva tarjeta -->
            <div class="mt-12 bg-card border-2 border-border rounded-lg p-8">
                <h3 class="text-2xl font-bold text-foreground mb-4">Solicitar Nueva Tarjeta</h3>
                <p class="text-muted-foreground mb-6">¿Necesitas una tarjeta adicional? Solicítala aquí.</p>
                <button class="h-14 px-8 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg">
                    Solicitar Tarjeta
                </button>
            </div>
        </main>
    </div>
@endsection
