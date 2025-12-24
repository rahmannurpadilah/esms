<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body{
      font-family: DejaVu Sans, sans-serif;
      font-size: 12px;
      color: #212529
    }

    .title{
      text-align: center;
      font-weight: 600;
      font-size: 16px;
      margin-bottom: 20px;
    }

    .card{
      border: 1px solid #dee2e6;
      border-radius: 6px;
      padding: 12px;
    }

    .table{
      width: 100%;
      border-collapse: collapse;
    }

    .table th,
    .table td{
      border: 1px solid #dee2e6;
      padding: 8px;
    }

    .table thead th{
      background-color: #f8f9fa;
      font-weight: 600;
    }

    .table-striped tbody tr:nth-child(even){
      background-color: #f9fafb;
    }

    .text-center{
      text-align: center;
    }

    .badge{
      display: inline-block;
      padding: 4px 10px;
      border-radius: 10px;
      font-size: 11px;
      color: #fff;
      background-color: #0d6efd;
    }

    .badge-success{
      background-color: #198754
    }

    .badge-danger{
      background-color: #dc3545
    }

    .footer {
      margin-top: 15px;
      font-size: 10px;
      text-align: right;
      color: #6c757d;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="title">My Education Data</div>
    <table class="table table-striped">
      <thead>
      <tr>
          <th width="5%" class="text-center">No</th>
          <th>Educational level</th>
          <th>School name</th>
          <th width="10%" class="text-center">Entry Year</th>
          <th width="12%" class="text-center">Graduation year</th>
          <th width="10%" class="text-center">Choice</th>
      </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($education as $index => $item)
      <tr>
          <td class="text-center">{{ $index + 1 }}</td>
          <td>{{ $item->educational_level }}</td>
          <td>{{ $item->school_name }}</td>
          <td class="text-center">{{ $item->entry_year }}</td>
          <td class="text-center">{{ $item->graduation_year }}</td>
          <td class="text-center">{{ $item->choice == 1 ? 'Formal' : 'Non-Formal' }}</td>
      </tr>
      @endforeach
      </tbody>
    </table>
    <div class="footer">
      Generated at {{ date('d M Y') }}
    </div>
  </div>
</body>
</html>