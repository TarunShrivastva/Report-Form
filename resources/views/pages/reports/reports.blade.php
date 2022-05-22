@extends('layouts.main')
@section('style')
@endsection

@section('content')
    <!-- Button trigger modal -->
    <section class="container">
        <div class="row">
            <form  id="filters" action="{{ url('report-list') }}" autocomplete="off" novalidate=novalidate>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control filter" id="name" aria-describedby="name" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control filter" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="submit" class="btn btn-primary" id="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="container" >
        <div class="row">
            <table id="data-table" class="table display" style="width:100%">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Phone No</th>
                        <th>Country</th>
                        <th>details</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            var table = dataTable();
            $('#filters').submit(function(e) {
                name = $('#name').val();
                email = $('#email').val();
                e.preventDefault();
                if((name != '') || (email != '')) {
                    table.destroy();
                    table = dataTable();
                }
            });
        });
        $('#reset').click(function(){
            resetTable();
        })

        function resetTable() {
            $('.filter').val('');
            $('#data-table').DataTable().ajax.reload( null, false);
        }
        function dataTable() {
            return $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url : "{{ url('report-list') }}",
                    type: 'GET',
                    data: function(data) {
                        data.name = $('#name').val();
                        data.email = $('#email').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'company_name',
                        name: 'company'
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'country',
                        name: 'country',
                    },
                    {
                        data: 'details',
                        name: 'details',
                    },
                ],
                searching: false,

            });
        }
    </script>
@endsection
