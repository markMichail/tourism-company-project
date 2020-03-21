@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:30px">
  <h3 class="text-center">Safe</h3>
  <hr>
  <br>
  <div class="row text-center">
    <div class="col-sm-6">
      <table id="tablePreview" class="table table-bordered">
        <thead>
          <tr class="white-text" style="background-color:#378B92;">
            <th colspan="5" class="col-12">Expenses</th>
          </tr>
          <tr class="black white-text">
            <th class="w-10">#</th>
            <th class="w-15">Rakm ezn al sarf</th>
            <th class="w-20">Price</th>
            <th class="w-40">Decription</th>
            <th class="w-15">Destination</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>222</td>
            <td>200LE</td>
            <td>...</td>
            <td>Transportation</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="col-12">
              <input type="button" name="" value="Add new">
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="col-sm-6">
      <table id="tablePreview" class="table table-bordered">
        <thead>
          <tr class="white-text" style="background-color:#378B92;">
            <th colspan="5" class="col-12">Revenue</th>
          </tr>
          <tr class="black white-text">
            <th class="w-10">#</th>
            <th class="w-15">Rakm ezn al sarf</th>
            <th class="w-20">Price</th>
            <th class="w-40">Decription</th>
            <th class="w-15">Destination</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>222</td>
            <td>200LE</td>
            <td>...</td>
            <td>Transportation</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="5" class="col-12">
              <input type="button" name="" value="Add new">
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection
