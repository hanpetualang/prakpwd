<center>Katalog Produk
<style>
    td{
        border-right: 1px solid lightgray;
        border-bottom: 1px solid lightgray;
    }
    th{
        border-bottom: 1px solid lightgray;
    }
</style>
<table>
    <tr>
        <th>Gambar</th>
        <th>Tipe</th>
        <th>Harga</th>
    </tr>
    @foreach ($dtProduct as $item)
    <tr>
        <td style="border-left: 1px solid lightgray"><img width="200px" height="180px" src="{{ asset('img/'.$item->img) }}" alt=""></td>
        <td>{{ $item->tipe }}</td>
        <td>{{ $item->harga }}</td>
    </tr>
    @endforeach
</table>
</center>
<script>window.print()</script>