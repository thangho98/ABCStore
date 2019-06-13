@foreach ($content as $item)
<tr>
    <th class="text-center">
        {{$item->id}}
    </th>
    <td class="font-w600 font-size-sm">{{$item->name}}</td>
    <td class="font-w600 font-size-sm">Màu:
        {{$item->attributes['propt_color']}}, Ram:
        {{$item->attributes['propt_ram']}} gb, Rom:
        {{$item->attributes['propt_rom']}}</td>
    <td class="d-none d-table-cell">
        <div class="form-group">
            <div class="input-group">
                <input id="input${product.id}"
                    class="form-control text-center" type="number" min="0" max="100" onchange="updateItem(this.value,'{{$item->id}}')"
                    required min="1" value="{{$item->quantity}}">
                <div class="input-group-append">
                    <span class="input-group-text">
                        %
                    </span>
                </div>
            </div>
        </div>
    </td>
    <td>{{number_format($item->price - $item->price*($item->quantity/100),0,',','.')}} VNĐ</td>
    <td>{{number_format($item->price,0,',','.')}} VNĐ</td>
    <td class="text-center">
        <div class="btn-group">
            <button type="button"
                class="btn btn-sm btn-danger deleteproduct" onclick="deleteCart({{$item->id}})"
                data-toggle="tooltip" title="Xóa sản phẩm">
                <i class="fa fa-fw fa-times"></i>
            </button>
        </div>
    </td>
</tr>
@endforeach