<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Apotek - SITI NURWAHIDA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('apoteks.update', $apotek->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">KODE OBAT</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA OBAT</label>
                                <input type="text" class="form-control @error('nama_ob') is-invalid @enderror" name="nama_ob" value="{{ old('nama_ob') }}" placeholder="Masukkan Nama Obat">
                            
                                <!-- error message untuk nama_ob -->
                                @error('nama_ob')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">JENIS OBAT</label>
                                <input type="text" class="form-control @error('jenis_ob') is-invalid @enderror" name="jenis_ob" value="{{ old('jenis_ob') }}" placeholder="Masukkan Jenis Obat">
                            
                                <!-- error message untuk jenis_ob -->
                                @error('jenis_ob')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">STOK OBAT</label>
                                <input type="text" class="form-control @error('stok_ob') is-invalid @enderror" name="stok_ob" value="{{ old('stok_ob') }}" placeholder="Masukkan Stok Obat">
                            
                                <!-- error message untuk stok_ob -->
                                @error('stok_ob')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">HARGA OBAT</label>
                                <input type="text" class="form-control @error('harga_ob') is-invalid @enderror" name="harga_ob" value="{{ old('harga_ob') }}" placeholder="Masukkan Harga Obat">
                            
                                <!-- error message untuk harga_ob -->
                                @error('harga_ob')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>