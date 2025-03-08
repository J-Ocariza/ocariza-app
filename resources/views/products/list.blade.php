<div>
    Products:
    <table>
        <thread>
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Category</td>

        </tr>
    </thread>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product['id'] }}</td>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['category'] }}</td>
        </tr>
        
        @endforeach
    </tbody>
    
    </table>
</div>
