<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniel Bloom - Curriculum Vitae</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #f1f1f1;
    padding: 20px;
    text-align: center;
}

h1,
h2,
h3 {
    margin-bottom: 0;
}

h1 {
    font-size: 2em;
}

h2 {
    font-size: 1.5em;
}

h3 {
    font-size: 1.2em;
    margin-top: 20px;
}

.contact-info,
.objective,
.education,
.work-experience,
.professional-qualification {
    padding: 5px 20px;
}

.contact-info,
.objective{
    border-bottom: 1px solid #ddd;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 5px;
}

th,
td {
    font-size: 0.9em;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

</style>
<body>
    <header>
        <h1>Curriculum Vitae</h1>
        <h2>{{ $data['basicInfo']->first_name }} {{ $data['basicInfo']->last_name }}</h2>
        <p><small>{{ $data['basicInfo']->profession }}</small></p>
    </header>
    <main>
        <section class="contact-info">
            <h3>Contact Information</h3>
            <p>Address: {{ $data['basicInfo']->address }}, {{ $data['basicInfo']->division }}, {{ $data['basicInfo']->post_code }}</p>
            <p>Email: {{ $data['basicInfo']->email }}</p>
            <p>Website: {{ $data['basicInfo']->website }}</p>
            <p>Phone: {{ $data['basicInfo']->phone }}</p>
        </section>
        <section class="objective">
            <h3>Objective</h3>
            <p>{{$data['objective']->career_object }}</p>
        </section>
        <section class="education">
            <h3>Education</h3>
            <table>
                <tr style="background-color: #f1f1f1;">
                    <th scope="col">Degree / Diploma</th>
                    <th scope="col">Institue</th>
                    <th scope="col">Year</th>
                </tr>
                @foreach ($data['educations'] as $edu)
                <tr>
                    <td>{{$edu->degree }}</td>
                    <td>{{$edu->institute }}</td>
                    <td>{{$edu->year }}</td>
                </tr>
                @endforeach
            </table>
        </section>
        <section class="work-experience">
            <h3>Work Experience</h3>
            <table>
                <tr style="background-color: #f1f1f1;">
                    <th>Company Name</th>
                    <th>Position</th>
                    <th>Year</th>
                </tr>
                @foreach ($data['works'] as $work)
                <tr>
                    <td>{{$work->company_name }}</td>
                    <td>{{$work->position }}</td>
                    <td>{{$work->year }}</td>
                </tr>
                @endforeach
            </table>
        </section>
        <section class="professional-qualification">
            <h3>Professional Qualification</h3>
            <table>
                <tr style="background-color: #f1f1f1;">
                    <th>Title</th>
                    <th>Regulated Body</th>
                    <th>Year</th>
                </tr>
                @foreach ($data['certificates'] as $cer)
                <tr>
                    <td>{{$cer->certificate_name }}</td>
                    <td>{{$cer->about }}</td>
                    <td>{{$cer->year }}</td>
                </tr>
                @endforeach
            </table>
        </section>
    </main>
</body>
</html>
