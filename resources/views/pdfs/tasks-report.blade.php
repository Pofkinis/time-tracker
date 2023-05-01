<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Resume</title>
</head>
<body>
<div style="margin: 0 auto;display: block;width: 500px;">
    <table width="100%" border="1">
        <thead>
        <tr>
            <th style="width: 20%">
                Title
            </th>
            <th style="width: 30%; overflow-wrap: anywhere">
                Comment
            </th>
            <th style="width: 15%">
                Deadline
            </th>
            <th style="width: 15%">
                Created At
            </th>
            <th style="width: 20%">
                Time Spent
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th style="width: 20%; overflow-wrap: anywhere">
                    {{ $task->title }}
                </th>
                <th style="width: 30%; overflow-wrap: anywhere">
                    {{ $task->comment }}
                </th>
                <th style="width: 15%; overflow-wrap: anywhere">
                    {{ $task->deadline }}
                </th>
                <th style="width: 15%; overflow-wrap: anywhere">
                    {{ $task->created_at }}
                </th>
                <th style="width: 20%; overflow-wrap: anywhere">
                    {{ $task->time_spent_hours ?? 0 }}:{{ $task->time_spent_minutes ?? 0 }}
                </th>
            </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Time spent total</th>
            <th>{{ $totalTime }}</th>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
