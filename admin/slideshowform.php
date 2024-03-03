<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3">Add Slideshow</h1>
    <form action="index.php?p=slideshow&action=1" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="txttitle" class="form-label">Title</label>
        <input type="text" class="form-control" id="txttitle" name="txttitle" required>
      </div>
      <div class="mb-3">
        <label for="txtsubtitle" class="form-label">Subtitle</label>
        <input type="text" class="form-control" id="txtsubtitle" name="txtsubtitle">
      </div>
      <div class="mb-3">
        <label for="tatext" class="form-label">Text</label>
        <textarea class="form-control" id="tatext" name="tatext" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="txtlink" class="form-label">Link</label>
        <input type="text" class="form-control" id="txtlink" name="txtlink">
      </div>
      <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="chkenable" name="chkenable" checked>
        <label class="form-check-label" for="chkenable">Enable</label>
      </div>
      <div class="mb-3">
        <label for="fileimg" class="form-label">Choose slideshow image</label>
        <input class="form-control form-control-sm" id="fileimg"  name ="fileimg" type="file" required>
      </div>
      <input type="submit" value="Add slideshow" class="btn btn-primary">
      <a href="index.php?p=slideshow" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</main>
