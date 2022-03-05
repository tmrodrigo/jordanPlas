@extends('backend.budget.base')


@section('content')
  <div class="m-4"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>Presupuestos emitidos</h2>
      </div>
    </div>
      <div class="card">
    <div class="card-body">
      <div class="row mb-2 d-none d-md-flex">
          <div class="col-sm-2">
           <b>Nº Presupuesto</b>
          </div>
          <div class="col-sm-6">
            <b>Cliente</b>
          </div>
          <div class="col-sm-2">
            <b>Fecha de emisión</b>
          </div>
          <div class="col-sm-2"></div>
        </div>
      @forelse ($budgets as $budget)
        <div class="row mb-2">
          <div class="col-sm-2">
            <b class="d-md-none">Nº Presupuesto</b>
            {{ str_pad($budget->id, 7, '0', STR_PAD_LEFT) }}
          </div>
          <div class="col-sm-6">
            <b class="d-md-none">Cliente</b>
            {{ $budget->client->name }}
          </div>
          <div class="col-sm-2">
            <b class="d-md-none">Fecha</b>
            {{ format_date($budget->budget_date) }}
          </div>
          <div class="col-sm-2 mt-2 mt-md-0">
            <button class="btn btn-outline-primary" onclick="window.open('{{ str_replace('storage/',  'storage/pdf/' , $budget->pdf_url) }}')" {{ $budget->pdf_url == null ? 'disabled' : '' }}> Ver </button>
          </div>
        </div>
        <hr>
      @empty
        <h3>No hay resultados sobre la búsqueda</h3>
      @endforelse
    </div>
  </div>
  </div>
@endsection