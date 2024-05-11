@extends('layouts.app')

@section('title', __('Detail of Banks'))

@section('content')
        <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header" style="margin-top: 5px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ __('Banks') }}</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('banks.index') }}">{{ __('Banks') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ __('Detail') }}
                                    </li>
                                </ol>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped">
                                            <tr>
                                            <td class="fw-bold">{{ __('Nama Bank') }}</td>
                                            <td>{{ $bank->nama_bank }}</td>
                                        </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Logo Bank') }}</td>
                                        <td>
                                            @if ($bank->logo_bank == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Logo Bank"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/logo_banks/' . $bank->logo_bank) }}" alt="Logo Bank" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Created at') }}</td>
                                                <td>{{ $bank->created_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Updated at') }}</td>
                                                <td>{{ $bank->updated_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
@endsection
