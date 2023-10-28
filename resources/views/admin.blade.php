@extends('layout-admin')
@section('title', 'AdminPanel')
@section('content')

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button"
                role="tab" aria-controls="home-tab-pane" aria-selected="true">Hodimlar</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
                role="tab" aria-controls="profile-tab-pane" aria-selected="false">Davomat</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button"
                role="tab" aria-controls="contact-tab-pane" aria-selected="false">Kasblar</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone number</th>
                        <th scope="col">Create Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['phonenumber'] }}</td>
                            <td>{{ $user['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Hodim</th>
                        <th scope="col">Kelgan vaqti</th>
                        <th scope="col">Ketgan Vaqti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($davomats as $davomat)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $davomat->user->name }}</td>
                            <td>{{ $davomat['time_start'] }}</td>
                            <td>{{ $davomat['time_stop'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <div>
                <h4>Kasb qo'shish</h4>
                <form action="{{ route('job.add') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="yangi kasb kiriting..." name="name">
                    <button class="btn btn-primary">qo'shish</button>
                </form>
            </div>
            <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nomi</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                            <div>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <h5 class="mt-2">{{ $job['name'] }}</h5>
                                    </td>
                                    <td>
                                        {{-- {{route('job.delete', ['job'=>$job->id])}} --}}
                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-link">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
