@extends('layout')

@section('title', 'Belajar MVC')
@section('navbar-brand', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Detail Kontak</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>{{ $contact->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $contact->address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer clearfix">
                    <a class="btn btn-default" href="{{ route('contacts.index') }}" role="button">Daftar Kontak</a>
                    <a class="btn btn-default pull-right" href="{{ route('contacts.edit', [ $contact->id ]) }}" role="button">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
