@extends('layouts.admin')

@section('content')
    <h1>Employees</h1>
    <div class="container-fluid">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>CNIC</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Default</td>
            <td>Defaultson</td>
            <td>def@somemail.com</td>
            <td>14301-6361899-1</td>
            <td><button class="success">Delete</button> </td>
        </tr>
        <tr class="success">
            <td>Success</td>
            <td>Doe</td>
            <td>john@example.com</td>
        </tr>
        <tr class="danger">
            <td>Danger</td>
            <td>Moe</td>
            <td>mary@example.com</td>
        </tr>
        <tr class="info">
            <td>Info</td>
            <td>Dooley</td>
            <td>july@example.com</td>
        </tr>
        <tr class="warning">
            <td>Warning</td>
            <td>Refs</td>
            <td>bo@example.com</td>
        </tr>
        <tr class="active">
            <td>Active</td>
            <td>Activeson</td>
            <td>act@example.com</td>
        </tr>
        </tbody>
    </table>
    </div>
@endsection