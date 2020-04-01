<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content alert-warning">
        <div class="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Delete</h5>
            <h5>Ingin Menghapus</h5>
            <?=var_dump($data)?>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger" id="delete">Hapus</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
  </div>
</div>