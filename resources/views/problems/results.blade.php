@extends('layouts.app')
@section('style')
  <style media="screen">
    td{
      color: white !important;
      font-size: 16px !important;
      font-weight: bold;
    }
    .th{
      color: white !important;
      font-size: 16px !important;
      font-weight: bold;
    }
  </style>
@endsection
@section('content')
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Result</th>
              <th scope="col">Time</th>
              <th scope="col">Points</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $result)
              @if($result == 0)
                <tr class="bg-success">
                  <th class="th" scope="tow">#</th>
                  <td><?php echo "Raspuns corect!" ?></td>
                  <td>TimeHere</td>
                  <td>20</td>
                </tr>
              @else
                <tr class="bg-danger">
                  <th class="th" scope="tow">#</th>
                  <td><?php echo "Raspuns gresit!" ?></td>
                  <td>TimeHere</td>
                  <td>0</td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
@endsection
