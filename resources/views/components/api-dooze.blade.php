
<h1 class="titre"> API Dooze</span></h1>

<div>
    Ayez accès aux commentaires des fans sur dooze.org grâce à l'API Dooze.
</div>
<div>
    Pour accéder à l'API, vous devez avoir un compte media. Vous obtenerez ainsi un Bearer Token.
</div>

<table>
    <tr>
        <th>Endpoint</th>
    </tr>
    <tr>
        <td>/api/comments</td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>club </td>
            <td>integer (required)</td>
            <td> ID, club's page </td>
        </tr>
        <tr>
            <td>visitor</td>
            <td>0 (false) or 1 (true) (required)</td>
            <td>Select the visitors' section or not</td>
        </tr>
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Club</th>
        </tr>
    </thead>
    <tbody>
@foreach ($clubs as $club)
        <tr>
            <td>{{$club->id_club}} </td>
            <td>{{$club->nom}}</td>
        </tr>
@endforeach
        
    </tbody>
</table>
