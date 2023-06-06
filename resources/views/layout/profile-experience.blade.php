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
        @for ($i = 0; $i < 3; $i++)
            <tr>
                <td>Master of Medecine</td>
                <td>June 2020</td>
                <td>CHU Hospital Oran</td>
            </tr>
        @endfor
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
        @for ($i = 0; $i < 3; $i++)
            <tr>
                <td>Radiologist</td>
                <td>Jul 2019</td>
                <td>CHU Hospital Oran</td>
            </tr>
        @endfor
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
        @for ($i = 0; $i < 3; $i++)
            <tr>
                <td>Top Radiologist Medal</td>
                <td>May 2022</td>
                <td>CHU Hospital Oran</td>
            </tr>
        @endfor
    </tbody>
</table>
