<table border="1px">
  <caption>table title and/or explanatory text</caption>
  <thead>
    <tr>
      <th>Sản phẩm</th>
    </tr>
  </thead>
  <tbody>
    @foreach($product_data as $val)
    <tr>
      <td>{!! $val["name"] !!}</td>
    </tr>
    @endforeach
  </tbody>
</table>
