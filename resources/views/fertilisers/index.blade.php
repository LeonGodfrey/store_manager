@extends('layouts.app3')

@section('title', 'Fertilisers ')
@section('page_title', 'Fertilisers')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right">
        <a href="{{ route('fertilisers.create') }}" class="btn float-right bg-success"><i class="fa fa-plus"></i> New Fertiliser
        </a>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <div class="card card-success card-outline">
            <div class="card-header">
                <h4 class="card-title text-success">Fertilisers</h4>
            </div>
            <div class="card-body table-responsive">
                <table id="example3" class="table table-hover table-head-fixed table-sm table-striped">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Code</th>
                           
                            <th>Pack Qty</th>
                            <th>Rate</th>
                            <th>Ha</th>
                            <th>unit cost</th>
                            <th>pack cost</th>
                            <th>Balance</th>
                            <th>Bal.cost</th>
                            <th>Bal.Ha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($fertilisers->isEmpty())
                            @foreach ($fertilisers as $fertiliser)                          
                            @php
                            $tons = $fertiliser->quantity_per_pack / $fertiliser->rate;
                            $pack_cost =  $fertiliser->unit_price * $fertiliser->quantity_per_pack;
                            $balance_cost =  $fertiliser->balance * $fertiliser->unit_price;
                            $balance_Ha = $fertiliser->balance / $fertiliser->rate;
                            @endphp
                                <tr class="text-nowrap">
                                    <td><a href="{{ route('fertilisers.edit', ['fertiliser' => $fertiliser]) }}">{{ $fertiliser->name }}</a>
                                    </td>
                                    <td>{{ $fertiliser->code }}</td>
                                    <td>{{ $fertiliser->quantity_per_pack }}</td>
                                    <td>{{ $fertiliser->rate }}</td>
                                    <td>{{ $tons }}</td>
                                    <td>{{ number_format($fertiliser->unit_price, 1, '.', ',') }}</td>
                                    <td>{{ number_format($pack_cost, 1, '.', ',') }}</td>
                                    <td>{{ $fertiliser->balance }}</td>
                                    <td>{{ number_format($balance_cost, 1, '.', ',') }} </td>  
                                    <td>{{ $balance_Ha }}</td>                           

                                </tr>
                            @endforeach
                        @else
                            <tr class="border-gray-300">
                                <td colspan="10">
                                    <p class="text-center">No Fertilisers Found</p>
                                </td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div>
    </div>

@endsection