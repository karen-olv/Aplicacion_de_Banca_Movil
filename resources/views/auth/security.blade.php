@extends('layouts.app')

@section('title', 'Seguridad - Bankario')

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
                <h1 class="text-2xl font-bold text-foreground">Seguridad</h1>
                <div class="w-24"></div>
            </div>
        </header>

        <main class="max-w-3xl mx-auto px-6 py-12">
            <h2 class="text-5xl font-bold text-foreground mb-12">Configuración de Seguridad</h2>

            @if(session('success'))
                <div class="mb-8 p-6 bg-green-50 border-2 border-green-200 rounded-lg">
                    <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Autenticación de dos factores -->
            <div class="bg-card border-2 border-border rounded-lg p-8 mb-8">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h3 class="text-2xl font-bold text-foreground mb-2">Autenticación de Dos Factores</h3>
                        <p class="text-muted-foreground">Agrega una capa extra de seguridad a tu cuenta</p>
                    </div>
                    <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-primary-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                </div>

                @if(!$twoFactorEnabled)
                    <form method="POST" action="{{ route('security.2fa') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-4">
                            <div class="p-6 bg-secondary rounded-lg">
                                <p class="text-sm font-semibold text-foreground mb-2">Paso 1: Ingresa tu número de teléfono</p>
                                <input
                                    id="phone"
                                    name="phone"
                                    type="tel"
                                    placeholder="+52 123 456 7890"
                                    class="w-full h-12 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                                    required
                                />
                            </div>

                            <div class="p-6 bg-secondary rounded-lg opacity-50">
                                <p class="text-sm font-semibold text-foreground mb-2">Paso 2: Verifica tu número</p>
                                <p class="text-sm text-muted-foreground">Recibirás un código de verificación</p>
                            </div>

                            <div class="p-6 bg-secondary rounded-lg opacity-50">
                                <p class="text-sm font-semibold text-foreground mb-2">Paso 3: Activación completa</p>
                                <p class="text-sm text-muted-foreground">Tu cuenta estará protegida</p>
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="w-full h-14 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg"
                        >
                            Habilitar 2FA
                        </button>
                    </form>
                @else
                    <div class="p-6 bg-green-50 border-2 border-green-200 rounded-lg">
                        <p class="text-green-800 font-semibold">Autenticación de dos factores habilitada</p>
                        <p class="text-sm text-green-700 mt-2">Tu cuenta está protegida con 2FA</p>
                    </div>
                @endif
            </div>

            <!-- Cambiar contraseña -->
            <div class="bg-card border-2 border-border rounded-lg p-8">
                <h3 class="text-2xl font-bold text-foreground mb-6">Cambiar Contraseña</h3>

                <form class="space-y-6">
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-foreground uppercase tracking-wide">
                            Contraseña Actual
                        </label>
                        <input
                            type="password"
                            class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                        />
                    </div>

                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-foreground uppercase tracking-wide">
                            Nueva Contraseña
                        </label>
                        <input
                            type="password"
                            class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                        />
                    </div>

                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-foreground uppercase tracking-wide">
                            Confirmar Nueva Contraseña
                        </label>
                        <input
                            type="password"
                            class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                        />
                    </div>

                    <button
                        type="submit"
                        class="w-full h-14 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg"
                    >
                        Actualizar Contraseña
                    </button>
                </form>
            </div>
        </main>
    </div>
@endsection
