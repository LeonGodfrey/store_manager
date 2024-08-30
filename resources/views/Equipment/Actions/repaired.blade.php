@extends('layouts.app6')

@section('title', 'Repaired ')
@section('page_title', 'Repaired Equipment')

@section('bread_crumb')
    <ol class="breadcrumb float-sm-right">
        <a href="{{ route('equipment.actions') }}" class="btn float-right bg-success"> <i class="fas fa-tasks"></i> Actions
        </a>
    </ol>
@endsection

@section('main_content')

 <!-- filter -->
 <div class="col-sm-12">
    <div class="card card-success card-outline elevation-3">
        <!-- /.card-header -->
        <div class="card-body pb-0">
            <form action="{{ route('equipment.actions.repaired') }}" method="get">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Filter by Equipment</label>
                                    <div class="input-group ">
                                        <select class="form-control select2" id="equipment_id" name="equipment_id">
                                            <option value="">--All equipments</option>
                                            @foreach ($equipments as $equipment)
                                                <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('equipment_id')
                                            <div class="text-sm text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>From:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="from_date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" required="required" />
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>To:</label>
                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                        <input type="text" name="to_date" class="form-control datetimepicker-input"
                                            data-target="#reservationdate1" />
                                        <div class="input-group-append" data-target="#reservationdate1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>:</label>
                                    <input type="submit" class="btn bg-success form-control" value="Submit">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div><!-- /.card -->
</div> <!-- filter -->


    <div class="col-sm-12">
        <div class="card card-success card-outline">           
            <div class="card-body table-responsive">
                <table id="example3" class="table table-hover table-head-fixed table-sm table-striped">
                    <thead>
                        <tr>
                            <th>Date repaired</th>
                            <th>Equipment</th>
                            <th>Recommended By</th>
                            <th>Issues</th>
                            <th>Repaired By</th>
                            <th>Action(s) Taken</th>
                        </tr>
                    </thead>
                    <tbody>
                        @unless ($actions->isEmpty())
                            @foreach ($actions as $action)
                                <tr class="text-nowrap">
                                    <td>
                                        @foreach ($action->returns as $return)
                                            {{ $return->date_r }}
                                        @endforeach
                                    </td>
                                    <td>{{ $action->equipment->name }}</td>
                                    <td>{{ $action->user->name }}</td>
                                    <td>{{ $action->remarks }}</td>
                                    <td>
                                        @foreach ($action->returns as $return)
                                            {{ $return->person->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($action->returns as $return)
                                            {{ $return->comment }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-gray-300">
                                <td colspan="10">
                                    <p class="text-center">No action Found</p>
                                </td>
                            </tr>
                        @endunless
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div>
    </div>

@endsection
