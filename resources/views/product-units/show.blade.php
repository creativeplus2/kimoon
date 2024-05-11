@extends('layouts.app')

@section('title', __('Detail of Product Units'))

@section('content')
        <div class="page-body">
                <div class="container-fluid">
                    <div class="page-header" style="margin-top: 5px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3>{{ __('Product Units') }}</h3>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/panel">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('product-units.index') }}">{{ __('Product Units') }}</a>
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
                                            <td class="fw-bold">{{ __('Nama Unit') }}</td>
                                            <td>{{ $productUnit->nama_unit }}</td>
                                        </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Created at') }}</td>
                                                <td>{{ $productUnit->created_at->format('d/m/Y H:i') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold">{{ __('Updated at') }}</td>
                                                <td>{{ $productUnit->updated_at->format('d/m/Y H:i') }}</td>
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
