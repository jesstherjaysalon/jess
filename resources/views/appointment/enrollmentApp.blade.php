@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div>
                <div class="card">
                    <div class="card-body p-3">
                            <div class="row">
                                <div>

                            <table class= "table table-striped align-items-center w-100 no-wrap">
                                <thead>
                                    <tr>
                                        <th>Fullname</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Age</th>
                                            <th>Email</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($appointments as $item)
                                    <tr>
                                        <td>{{ $item->Fullname }}</td>
                                        <td>{{ $item->Phone_number }}</td>
                                        <td>{{ $item->Address }}</td>
                                        <td>{{ $item->Age }}</td>
                                        <td>{{ $item->Email }}</td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                            </div>
                        </div>
                    </div>      
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection


