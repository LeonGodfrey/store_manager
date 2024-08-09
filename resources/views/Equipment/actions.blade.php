@extends('layouts.app6')

@section('title', 'Actions ')
@section('page_title', 'Actions')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right">
       <li> <a href="{{ route('equipment.create') }}" class="btn float-right bg-success"><i class="fas fa-plus"></i> Add new
        </a></li>
        <li><a href="{{ route('equipment.actions.pending_return') }}" class="btn float-right bg-success"> <i class="fas fa-redo"></i> Return
        </a></li>
      <li>  <a href="{{ route('equipment.actions.pending_repair') }}" class="btn float-right bg-success"><i class="fas fa-exclamation-triangle"></i> Repair
        </a></li> 
      <li>  <a href="{{ route('equipment.actions.actions_performed') }}" class="btn float-right bg-success"><i class="fa fa-undo"></i> Reverse
        </a></li>
    </ol>
@endsection

@section('main_content')

    <div class="col-sm-12">
        <div class="card card-success card-outline">
            <div class="card-body table-responsive">
                <table id="example3" class="table table-hover table-head-fixed table-sm table-striped">
                    <thead>
                        <tr>
                            
                            
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity in stock</th>
                            <th>Give out</th>
                            <th>Add quantity</th>
                            <th>Recommend for repair</th>
                            <th>Dispose</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($equipment->isEmpty())
                            @foreach ($equipment as $equipment)                          
                                <tr class="text-nowrap">
                                    <td><a href="{{ route('equipment.edit', ['equipment' => $equipment]) }}">{{ $equipment->image }}</a>
                                    </td>
                                    <td>{{ $equipment->name }}</td>
                                    <td>{{ $equipment->quantity_in_stock }}</td>
                                    <td><a href="{{ route('equipment.actions.give') }}">Give out</a></td>
                                    <td><a href="{{ route('equipment.actions.add') }}">Add quantity</a></td>
                                    <td><a href="{{ route('equipment.actions.recommend_for_repair') }}">Recommend for repair</a></td>
                                    <td><a href="{{ route('equipment.actions.dispose') }}">Dispose</a></td>
                                                   
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-gray-300">
                                <td colspan="10">
                                    <p class="text-center">No equipment Found</p>
                                </td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div>
    </div>

@endsection
