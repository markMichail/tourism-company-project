@extends('layouts.app')


@section('content')


<div  style=" width:95%; margin:auto">
  <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Safe</h3>
  <br>
  <div class="row text-center">
    <div  class="col-lg-6">
      <table id="tablePreview" class="table table-bordered">
        <thead>
          <tr class="white-text" style="background-color:#378B92;">
            <th colspan="7" class="col-12">Expenses</th>
          </tr>
          <tr class="black white-text">
            <th class="w-10">#</th>
            <th class="w-15">Recipt ID</th>
            <th class="w-40">Employee ID</th>
            <th class="w-20">Price</th>
            <th class="w-40">Description</th>
            <th class="w-15">Destination</th>
            <th class="w-40">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($receipts as $index => $receipt)
         
          @if($receipt->type == 'Expense')
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td> {{$receipt->id}} </td>
            <td>{{ $receipt->employee_id }}</td>
            <td>{{ $receipt->total_amount }}</td>
            <td>{{ $receipt->description }}</td>
            <td>{{ $receipt->destination }}</td>
            <td>{{ $receipt->receipt_date }}</td>
          </tr>
          @endif
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="7" class="col-12">
              <input type="button" class="btn btn-primary" onclick="modal('Expense')" id="Expense" value="Add new expense" data-toggle="modal" data-target="#modaladdnewexpense">
            </td>
          </tr>
        </tfoot>
      </table>
      </div>
    <div class="col-lg-6">
      <table  id="tablePreview" class="table table-bordered">
        <thead>
          <tr class="white-text" style="background-color:#378B92;">
            <th colspan="7" class="col-12">Revenue</th>
          </tr>
          <tr class="black white-text">
            <th class="w-10">#</th>
            <th class="w-15">Recipt ID</th>
            <th class="w-40">Employee ID</th>
            <th class="w-20">Price</th>
            <th class="w-40">Description</th>
            <th class="w-15">Destination</th>
            <th class="w-40">Date</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($receipts as $receipt)
          @if($receipt->type == 'Revenue')
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td> {{$receipt->id}} </td>
            <td>{{ $receipt->employee_id }}</td>
            <td>{{ $receipt->total_amount }}</td>
            <td>{{ $receipt->description }}</td>
            <td>{{ $receipt->destination }}</td>
            <td>{{ $receipt->receipt_date }}</td>
          </tr>
          @endif
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="7" class="col-12">
              <input type="button" class="btn btn-primary" onclick="modal('Revenue')" name="" value="Add new revenue" data-toggle="modal" data-target="#modaladdnewexpense">
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="modaladdnewexpense" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Expense</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="{{ route('saferecieptsstore') }}" method="POST" class="border border-light p-5">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="formGroupExampleInput2">Destination Name</label>
            <input type="text" class="form-control @error('destinationname') is-invalid @enderror"  value="{{ old('destinationname') }}" id="formGroupExampleInput2" placeholder="Destination Name" name="destinationname">
            @error('destinationname')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Price" name="price">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Description" name="description">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Date</label>
            <input type="date" class="form-control @error('description') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Date" name="date">
            @error('date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group hidden" style="display:none">
            <label for="formGroupExampleInput2">Type</label>
            <input type="text" class="form-control"   placeholder="Type" id="type" value=""  name="type">
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-info btn-block my-4" type="submit">Add</button>
          
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- <div class="modal fade" id="modaladdnewrevenue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Revenue</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form action="{{ route('saferecieptsstore') }}" method="POST" class="border border-light p-5">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="formGroupExampleInput2">Destination Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Destination Name" name="destinationname">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Price</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Price" name="price">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description" name="description">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Date</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Date" name="date">
          </div>
          <div class="form-group d-none">
            <label for="formGroupExampleInput2">Type</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Type" name="type" value="Revenue">
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-info btn-block my-4" type="submit">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> --}}
<script>
  function modal(button){
    document.getElementById("type").value=button;
    }
    @if (count($errors) > 0)
    $('#modaladdnewexpense').modal('show');
    @endif
  </script>
@endsection

