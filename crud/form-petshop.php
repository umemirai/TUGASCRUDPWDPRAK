<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add Animal</title>
  <link rel="stylesheet" href="styleformpetshop.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
  <div class="form-container">
    <h2>Add Animal</h2>
    <form action="/TUGASCRUD/crud/simpan.php" method="POST" enctype="multipart/form-data">
      <label for="nama_hewan">Name</label>
      <input type="text" id="nama_hewan" name="nama_hewan" required />

      <label for="jenis">Type</label>
      <input type="text" id="jenis" name="jenis" required />

      <label for="usia">Age (years)</label>
      <input type="number" id="usia" name="usia" required />

      <label for="gambar">Cover</label>
      <input type="file" id="gambar" name="gambar" />

      <button type="submit">Submit Animal</button>
    </form>
  </div>
</body>
</html>
