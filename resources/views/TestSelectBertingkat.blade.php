<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dropdown Depedency - Studi kasus Pemilihan Propinsi Indonesia</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<select id="merk" name="merk">
  <option value="">Pilih Merk Kendaraan Dahulu</option>
  @foreach ($MerkKendaraan as $DataMerkKendaraan)
    <option value="{{$DataMerkKendaraan->id}}">{{$DataMerkKendaraan->merk}}</option>
  @endforeach
</select>

<select id="tipe" name="tipe">
  <option value="">Test</option>
</select>

<script>
    $('#merk').change(function()
    {
        $.get('/testing/tipe/'+this.value+'/tipes.json', function(tipes)
        {
          alert(this.value);
            var $tipe = $('#tipe');

            $tipe.find('option').remove().end();

            $.each(tipes, function(index, tipe) {
                $tipe.append('<option value="' + tipe.id + '">' + tipe.tipe + '</option>');
            });
        });
    });

    $(document).ready(function() {
        $(".merk option[value='0']").attr("disabled","disabled");
        $(".tipe option[value='0']").attr("disabled","disabled");
    });
</script>
