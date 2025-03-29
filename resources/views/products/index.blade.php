<x-layout>
    <x-slot:heading>
        Product List
    </x-slot:heading>
</x-layout>

<x-table>
    <thread>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Product</th>
            <th scope="col">Category</th>
        </tr>
    </thread>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scoope="row">{{ $product['id'] }}</th>
            <td>{{ $product['name'] }}</td>
            <td>{{ $product['category'] }}</td>
        </tr>
        
        @endforeach
    </tbody>
</x-table>


