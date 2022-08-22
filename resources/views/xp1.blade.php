<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

    <thead style="color:red">
        <tr>
            <th width=20>Tip</th>
            <th width=30 >Nama</th>
            <th>Max</th>
            <th>Satuan</th>
            @foreach($barangmasuk as $key =>$items)
                <th  width=15 style="background-color:green;color:white" >{{$items->tanggal}}</th>
            @endforeach
            @foreach($barangkeluar as $key =>$items)
                <th  width=15 style="background-color:red;color:white" >{{$items->tanggal}}</th>
            @endforeach
            
            <th>Sisa</th>
            <th>Harga</th>
            <th>Total</th>
       
        
       
    </thead>
    
    <tbody style="color:black">
    
        @foreach ($data as $key => $items)
            <tr>
                @if ($items->tipe == 1)
                <td>Alat Tulis Kantor</td>
                @else
                <td>Alat Kebersihan</td>
                @endif
        
                <td>{{ $items->nama }}</td>
                <td>{{ $items->max }}</td>
                <td>{{ $items->satuan }}</td>
    
                {{-- <tr> --}}
                @foreach($barangmasuk as $key =>$bm)
                    <td style="background-color:#2ecc71;color:white">{{isset($barangmasuktd[$bm->tanggal]["key_".$items->id]) ? $barangmasuktd[$bm->tanggal]["key_".$items->id]  : ''}}</td>
                @endforeach
                {{-- </tr> --}}
                {{-- <tr> --}}
                @foreach($barangkeluar as $key =>$bk)
                <td style="background-color:#ff4d4d;color:white">{{isset($barangkeluartd[$bk->tanggal]["key_".$items->id]) ? $barangkeluartd[$bk->tanggal]["key_".$items->id]  : ''}}</td>
                @endforeach
                {{-- </tr> --}}
                @if($items->jumlah == 0)
                    <td style="background-color:red;color:white" >{{ $items->jumlah }}</td>
                @else
                <td style="background-color:green;color:white" >{{ $items->jumlah }}</td>
                @endif
    
    
                <td>{{ $items->harga }}</td>
                 
                <td> {{$items->jumlah*$items->harga}}</td>
                </tr>


                
                @endforeach
               
         @if($dataq == null)
                @else
                <tr><td colspan="{{$jumlahmk+1}}">TOTAL</td><td><b>{{$total}}</b></td>
                </tr>
                @endif
</tbody>
</table>