@extends('layouts.app')

@section('template_title')
    Clientes Bancos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clientes Bancos') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clientes-bancos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombre</th>
									<th >Apellido</th>
									<th >Email</th>
									<th >Telefono</th>
									<th >Numero Cuenta</th>
									<th >Saldo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientesBancos as $clientesBanco)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $clientesBanco->nombre }}</td>
										<td >{{ $clientesBanco->apellido }}</td>
										<td >{{ $clientesBanco->email }}</td>
										<td >{{ $clientesBanco->telefono }}</td>
										<td >{{ $clientesBanco->numero_cuenta }}</td>
										<td >{{ $clientesBanco->saldo }}</td>

                                            <td>
                                                <form action="{{ route('clientes-bancos.destroy', $clientesBanco->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clientes-bancos.show', $clientesBanco->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes-bancos.edit', $clientesBanco->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $clientesBancos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
