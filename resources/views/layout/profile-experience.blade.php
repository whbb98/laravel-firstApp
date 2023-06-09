@php
    $career = $user->career;
@endphp

<h5 class="fw-bold text-custom-primary mt-4">Education</h5>
<table class="table education table-hover">
    <thead>
        <tr class="text-custom-primary">
            <th scope="col">Degree</th>
            <th scope="col">Period</th>
            <th scope="col">University/ Institute</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($career as $item)
            @if ($item['type'] == 'education')
                <tr id="{{ $item['id'] }}">
                    <td>{{ $item['career_name'] }}</td>
                    <td>{{ $item['period'] }}</td>
                    <td>{{ $item['organization'] }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

<h5 class="fw-bold text-custom-primary mt-4">Professional Experience</h5>
<table class="table experience table-hover">
    <thead>
        <tr class="text-custom-primary">
            <th scope="col">Position</th>
            <th scope="col">Period</th>
            <th scope="col">Organization</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($career as $item)
        @if ($item['type'] == 'experience')
            <tr id="{{ $item['id'] }}">
                <td>{{ $item['career_name'] }}</td>
                <td>{{ $item['period'] }}</td>
                <td>{{ $item['organization'] }}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>

<h5 class="fw-bold text-custom-primary mt-4">Rewards</h5>
<table class="table rewards table-hover">
    <thead>
        <tr class="text-custom-primary">
            <th scope="col">Reward Name</th>
            <th scope="col">Period</th>
            <th scope="col">Organization</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($career as $item)
        @if ($item['type'] == 'reward')
            <tr id="{{ $item['id'] }}">
                <td>{{ $item['career_name'] }}</td>
                <td>{{ $item['period'] }}</td>
                <td>{{ $item['organization'] }}</td>
            </tr>
        @endif
    @endforeach
    </tbody>
</table>
