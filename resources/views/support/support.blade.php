@extends('layouts.app')

@section('title', 'Soporte - Bankario')

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
                <h1 class="text-2xl font-bold text-foreground">Soporte</h1>
                <div class="w-24"></div>
            </div>
        </header>

        <main class="max-w-5xl mx-auto px-6 py-12">
            <h2 class="text-5xl font-bold text-foreground mb-12">Centro de Ayuda</h2>

            @if(session('success'))
                <div class="mb-8 p-6 bg-green-50 border-2 border-green-200 rounded-lg">
                    <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                </div>
            @endif

            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Formulario de contacto -->
                <div class="bg-card border-2 border-border rounded-lg p-8">
                    <h3 class="text-2xl font-bold text-foreground mb-6">Contáctanos</h3>

                    <form method="POST" action="{{ route('support.store') }}" class="space-y-6">
                        @csrf

                        <div class="space-y-3">
                            <label for="subject" class="block text-sm font-medium text-foreground uppercase tracking-wide">
                                Asunto
                            </label>
                            <input
                                id="subject"
                                name="subject"
                                type="text"
                                placeholder="¿En qué podemos ayudarte?"
                                class="w-full h-14 px-4 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none"
                                required
                            />
                        </div>

                        <div class="space-y-3">
                            <label for="message" class="block text-sm font-medium text-foreground uppercase tracking-wide">
                                Mensaje
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                placeholder="Describe tu consulta o problema..."
                                class="w-full px-4 py-3 text-base bg-background border-2 border-border focus:border-foreground transition-colors rounded-lg outline-none resize-none"
                                required
                            ></textarea>
                        </div>

                        <button
                            type="submit"
                            class="w-full h-14 text-base font-semibold bg-primary hover:bg-primary/90 text-primary-foreground transition-all rounded-lg"
                        >
                            Enviar Mensaje
                        </button>
                    </form>

                    <!-- Información de contacto -->
                    <div class="mt-8 pt-8 border-t-2 border-border space-y-4">
                        <div>
                            <p class="text-sm uppercase tracking-wide text-muted-foreground mb-1">Teléfono</p>
                            <p class="text-base font-semibold text-foreground">01 800 BANKARIO</p>
                        </div>
                        <div>
                            <p class="text-sm uppercase tracking-wide text-muted-foreground mb-1">Email</p>
                            <p class="text-base font-semibold text-foreground">soporte@bankario.com</p>
                        </div>
                        <div>
                            <p class="text-sm uppercase tracking-wide text-muted-foreground mb-1">Horario</p>
                            <p class="text-base font-semibold text-foreground">24/7 disponible</p>
                        </div>
                    </div>
                </div>

                <!-- Preguntas frecuentes -->
                <div class="bg-card border-2 border-border rounded-lg p-8">
                    <h3 class="text-2xl font-bold text-foreground mb-6">Preguntas Frecuentes</h3>

                    <div class="space-y-6">
                        @foreach($faqs as $faq)
                            <div class="pb-6 border-b-2 border-border last:border-b-0 last:pb-0">
                                <h4 class="text-base font-semibold text-foreground mb-2">{{ $faq['question'] }}</h4>
                                <p class="text-sm text-muted-foreground">{{ $faq['answer'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <button class="mt-8 w-full h-12 text-sm font-semibold border-2 border-border hover:border-foreground text-foreground transition-all rounded-lg">
                        Ver Todas las Preguntas
                    </button>
                </div>
            </div>
        </main>
    </div>
@endsection
