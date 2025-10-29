@extends('layouts.app')

@section('template_title')
    {{ $clientesBanco->name ?? __('Show') . " " . __('Clientes Banco') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Clientes Banco</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clientes-bancos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $clientesBanco->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Apellido:</strong>
                                    {{ $clientesBanco->apellido }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $clientesBanco->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Telefono:</strong>
                                    {{ $clientesBanco->telefono }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Numero Cuenta:</strong>
                                    {{ $clientesBanco->numero_cuenta }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Saldo:</strong>
                                    {{ $clientesBanco->saldo }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
