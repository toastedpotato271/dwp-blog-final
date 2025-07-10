<div>
    <table>
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>View</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
