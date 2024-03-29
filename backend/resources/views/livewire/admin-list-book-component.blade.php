<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<div>
    <div class='container-fluid px-4'>
        <div class="container">
            <div class='card mt-4'>
                <div class='card-header'>
                    <h2>All Books
                        <a href="{{ route('addbook') }}" class='btn btn-primary btn-sm float-end' style='marginTop:8px'>Add Books</a>
                    </h2>
                </div>
                <div class='card-body'>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <table class="table table-striped" id="bookTable">
                        <thead>
                            <tr>
                                <th scope="col">Id #</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Publication Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $xCount = 1;
                        @endphp
                        @foreach ( $books as $key => $val )
                            <tr>
                                <th scope="row">{{ $xCount }}</th>
                                <td><img src="assets\uploaded_images\books\{{ $val->image }}" style="width: 50px; height: 50px;" /></td>
                                <td>{{ $val->title }}</td>
                                <td>{{ $val->quantity }}</td>
                                <td>{{ $val->retail_price }}</td>
                                <td>{{ $val->category }}</td>
                                <td>{{ $val->publication_date }}</td>
                                <td><a href="/admin-editbook/{{$val->isbn}}"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            @php
                                $xCount++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#bookTable").DataTable()
</script>